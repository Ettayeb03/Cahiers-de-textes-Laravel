<?php

namespace App\CustomAuth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class EloquentUserProvider implements UserProvider
{
    protected $hasher;
    protected $model;

    public function __construct($hasher, $model)
    {
        $this->hasher = $hasher;
        $this->model = $model;
    }

    public function retrieveById($identifier)
    {
        return $this->createModel()->newQuery()->find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        $model = $this->createModel();
        return $model->newQuery()
            ->where($model->getKeyName(), $identifier)
            ->where($model->getRememberTokenName(), $token)
            ->first();
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        if ($user instanceof \Illuminate\Database\Eloquent\Model) {
            $user->setRememberToken($token);
            $user->save();
        } else {
            throw new \InvalidArgumentException('The user instance must be an Eloquent model.');
        }
    }

    public function retrieveByCredentials(array $credentials)
    {
        $query = $this->createModel()->newQuery();

        foreach ($credentials as $key => $value) {
            if (!str_contains($key, 'password')) {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return $this->hasher->check($credentials['password'], $user->getAuthPassword());
    }

    protected function createModel()
    {
        return new $this->model;
    }
}
