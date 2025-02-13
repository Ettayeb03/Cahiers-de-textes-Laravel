<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Prof extends Model
{
    use HasFactory;

    // Specify the fillable properties
    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'password', 'user_id'];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class); // Un professeur appartient à un utilisateur
    }
    // Hash the password before saving
    public static function boot()
    {
        parent::boot();

        static::creating(function ($prof) {
            if ($prof->password) {
                $prof->password = Hash::make($prof->password); // Hash the password before saving
            }
        });
    }

    // Disable timestamps if they are not present in your table
    public $timestamps = false;

    /**
     * Retrieve all professors.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAllProfs()
    {
        return self::all();
    }

    /**
     * Retrieve a professor by their ID.
     *
     * @param int $id
     * @return \App\Models\Prof|null
     */
    public static function getProfById($id)
    {
        return self::find($id);
    }

    /**
     * Add a new professor.
     *
     * @param array $data
     * @return \App\Models\Prof
     */
    public static function storeProf($data)
    {
        return self::create($data);
    }

    /**
     * Update an existing professor.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Prof|null
     */
    public static function updateProf($id, $data)
    {
        $prof = self::find($id);
        if ($prof) {
            $prof->update($data);
            return $prof;
        }
        return null;
    }

    /**
     * Delete a professor by their ID.
     *
     * @param int $id
     * @return bool
     */
    public static function deleteProf($id)
    {
        $prof = self::find($id);
        if ($prof) {
            return $prof->delete();
        }
        return false;
    }
}
