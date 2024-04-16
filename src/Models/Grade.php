<?php

namespace src\Models;


use src\Services\Hydratation;



class Grade {
    
    private int $IdGrade;
    private string $NameGrade;
    private int $StudentNumberGrade;
    private string $DateStartGrade;
    private string $DateEndGrade;


    use Hydratation;



    /**
     * Get the value of IdGrade
     */
    public function getIdGrade(): int
    {
        return $this->IdGrade;
    }

    /**
     * Set the value of IdGrade
     */
    public function setIdGrade(int $IdGrade): self
    {
        $this->IdGrade = $IdGrade;

        return $this;
    }

    
    

    /**
     * Get the value of NameGrade
     */
    public function getNameGrade(): string
    {
        return $this->NameGrade;
    }

    /**
     * Set the value of NameGrade
     */
    public function setNameGrade(string $NameGrade): self
    {
        $this->NameGrade = $NameGrade;

        return $this;
    }

    /**
     * Get the value of StudentNumberGrade
     */
    public function getStudentNumberGrade(): int
    {
        return $this->StudentNumberGrade;
    }

    /**
     * Set the value of StudentNumberGrade
     */
    public function setStudentNumberGrade(int $StudentNumberGrade): self
    {
        $this->StudentNumberGrade = $StudentNumberGrade;

        return $this;
    }

    /**
     * Get the value of DateStartGrade
     */
    public function getDateStartGrade(): string
    {
        return $this->DateStartGrade;
    }

    /**
     * Set the value of DateStartGrade
     */
    public function setDateStartGrade(string $DateStartGrade): self
    {
        $this->DateStartGrade = $DateStartGrade;

        return $this;
    }

    /**
     * Get the value of DateEndGrade
     */
    public function getDateEndGrade(): string
    {
        return $this->DateEndGrade;
    }

    /**
     * Set the value of DateEndGrade
     */
    public function setDateEndGrade(string $DateEndGrade): self
    {
        $this->DateEndGrade = $DateEndGrade;

        return $this;
    }

    /**
     * Get the value of IdGrade
     */
    

    
}