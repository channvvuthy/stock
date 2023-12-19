<?php
namespace App\Modules\Auth;

use App\Models\User;

class AuthService
{
    /**
     * Create a new user.
     *
     * @param array $data The data for creating the user.
     * @return User The newly created user.
     */
    public static function create($data)
    {
        return User::create($data);
    }

    /**
     * Find a user by their email.
     *
     * @param string $email The email of the user to find.
     * @return User|null The user with the specified email, or null if not found.
     */
    public static function findUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Verify the password for a given user.
     *
     * @param mixed $user The user object.
     * @param string $password The password to verify.
     * @return bool Returns true if the password is valid, false otherwise.
     */
    public static function verifyPassword($user, $password)
    {
        return password_verify($password, $user->password);
    }

    /**
     * Authenticates a user by their email and password.
     *
     * @param string $email The email of the user.
     * @param string $password The password of the user.
     * @throws \Exception If the email or password is invalid.
     * @return User|null The authenticated user object, or null if authentication fails.
     */
    public static function login($email, $password)
    {
        $user = self::findUserByEmail($email);
        if ($user && self::verifyPassword($user, $password)) {
            return $user;
        }
        throw new \Exception('Invalid email or password');
    }


}