<?php 

namespace src\Models;

use src\Services\Hydratation;

class User {
    private int $IdUser;
    private string $LastNameUser;
    private string $FirstNameUser;
    private string $PasswordUser;
    private bool $ActivatedUser;
    private string $EmailUser;
    private int $IdRole;


    use Hydratation;

    



    /**
     * Get the value of IdUser
     */
    public function getIdUser(): int
    {
        return $this->IdUser;
    }

    /**
     * Set the value of IdUser
     */
    public function setIdUser(int $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    /**
     * Get the value of LastNameUser
     */
    public function getLastNameUser(): string
    {
        return $this->LastNameUser;
    }

    /**
     * Set the value of LastNameUser
     */
    public function setLastNameUser(string $LastNameUser): self
    {
        $this->LastNameUser = $LastNameUser;

        return $this;
    }

    /**
     * Get the value of FirstNameUser
     */
    public function getFirstNameUser(): string
    {
        return $this->FirstNameUser;
    }

    /**
     * Set the value of FirstNameUser
     */
    public function setFirstNameUser(string $FirstNameUser): self
    {
        $this->FirstNameUser = $FirstNameUser;

        return $this;
    }

    /**
     * Get the value of PasswordUser
     */
    public function getPasswordUser(): string
    {
        return $this->PasswordUser;
    }

    /**
     * Set the value of PasswordUser
     */
    public function setPasswordUser(string $PasswordUser): self
    {
        $this->PasswordUser = $PasswordUser;

        return $this;
    }

    /**
     * Get the value of ActivatedUser
     */
    public function isActivatedUser(): bool
    {
        return $this->ActivatedUser;
    }

    /**
     * Set the value of ActivatedUser
     */
    public function setActivatedUser(bool $ActivatedUser): self
    {
        $this->ActivatedUser = $ActivatedUser;

        return $this;
    }

    /**
     * Get the value of EmailUser
     */
    public function getEmailUser(): string
    {
        return $this->EmailUser;
    }

    /**
     * Set the value of EmailUser
     */
    public function setEmailUser(string $EmailUser): self
    {
        $this->EmailUser = $EmailUser;

        return $this;
    }

    /**
     * Get the value of IdRole
     */
    public function getIdRole(): int
    {
        return $this->IdRole;
    }

    /**
     * Set the value of IdRole
     */
    public function setIdRole(int $IdRole): self
    {
        $this->IdRole = $IdRole;

        return $this;
    }


    public function getObjectToArray(): array
    {
        return ['Id_User' => $this->getIdUser(), 'LastName_User' => $this->getLastNameUser(), 'FirstName_User' => $this->getFirstNameUser(), 'Password_User' => $this->getPasswordUser(), 'Activated_User' => $this->isActivatedUser(), 'Email_User' => $this->getEmailUser(), 'Id_Role' => $this->getIdRole()];
    }



}