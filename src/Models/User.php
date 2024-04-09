<?php 

namespace src\Models;

use src\Services\Hydratation;

class User {
    private int $Id_User;
    private string $LastName_User;
    private string $FirstName_User;
    private string $Password_User;
    private bool $Activated_User;
    private string $Email_User;
    private int $Id_Role;


    use Hydratation;




    /**
     * Get the value of Id_User
     */
    public function getIdUser(): int
    {
        return $this->Id_User;
    }

    /**
     * Set the value of Id_User
     */
    public function setIdUser(int $Id_User): self
    {
        $this->Id_User = $Id_User;

        return $this;
    }

    /**
     * Get the value of LastName_User
     */
    public function getLastNameUser(): string
    {
        return $this->LastName_User;
    }

    /**
     * Set the value of LastName_User
     */
    public function setLastNameUser(string $LastName_User): self
    {
        $this->LastName_User = $LastName_User;

        return $this;
    }

    /**
     * Get the value of FirstName_User
     */
    public function getFirstNameUser(): string
    {
        return $this->FirstName_User;
    }

    /**
     * Set the value of FirstName_User
     */
    public function setFirstNameUser(string $FirstName_User): self
    {
        $this->FirstName_User = $FirstName_User;

        return $this;
    }

    /**
     * Get the value of Password_User
     */
    public function getPasswordUser(): string
    {
        return $this->Password_User;
    }

    /**
     * Set the value of Password_User
     */
    public function setPasswordUser(string $Password_User): self
    {
        $this->Password_User = $Password_User;

        return $this;
    }

    /**
     * Get the value of Activated_User
     */
    public function isActivatedUser(): bool
    {
        return $this->Activated_User;
    }

    /**
     * Set the value of Activated_User
     */
    public function setActivatedUser(bool $Activated_User): self
    {
        $this->Activated_User = $Activated_User;

        return $this;
    }

    /**
     * Get the value of Email_User
     */
    public function getEmailUser(): string
    {
        return $this->Email_User;
    }

    /**
     * Set the value of Email_User
     */
    public function setEmailUser(string $Email_User): self
    {
        $this->Email_User = $Email_User;

        return $this;
    }

    /**
     * Get the value of Id_Role
     */
    public function getIdRole(): int
    {
        return $this->Id_Role;
    }

    /**
     * Set the value of Id_Role
     */
    public function setIdRole(int $Id_Role): self
    {
        $this->Id_Role = $Id_Role;

        return $this;
    }
}