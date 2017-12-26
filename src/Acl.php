<?php
namespace Alxmedeiros\LaravelAcl;

trait Acl {

    public function roles() {
        return $this->belongsToMany(\Alxmedeiros\LaravelAcl\Models\Role::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles) {
        if (is_array($roles)) {
            $hasAnyRole = $this->hasAnyRole($roles);
            if ($hasAnyRole) {
                return $hasAnyRole;
            }

            throw new \Exception('This action is unauthorized.', 401);
        }

        $hasRole = $this->hasRole($roles);

        if ( $hasRole ) {
            return $hasRole;
        }

        throw new \Exception('This action is unauthorized.', 401);
    }

    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role) {
        return null !== $this->roles()->where('name', $role)->first();
    }
}