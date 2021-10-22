<?php

function removeUser(User $user)
{
    if ($user->isAdmin()) {
        throw new Exception('Vous ne pouvez pas supprimer un administrateur');
    }

    // code métier qui supprime un utilisateur
    return true;
}

$user1 = new User('Anthony', [User::ROLE_ADMIN]);
$user2 = new User('Camille', [User::ROLE_USER]);

$usersToRemove = [$user1, $user2];

try {
    foreach ($usersToRemove as $user) {
        removeUser($user);
    }
} catch (Exception $exception) {
    echo sprintf("[%s] - %s: %s ligne %s", $exception->getCode(), $exception->getMessage(), $exception->getFile(), $exception->getLine());
    echo '<pre>';
    foreach ($exception->getTrace() as $item) {
        var_dump($item);
    }
} finally {
    echo 'utilisateur traitré';
}

class User
{
    public $name;

    public $roles = [];

    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_USER = 'ROLE_USER';

    public function __construct(string $name, array $roles)
    {
        $this->name = $name;
        $this->roles = $roles;
    }

    public function isAdmin()
    {
        return in_array(self::ROLE_ADMIN, $this->roles);
    }
}
