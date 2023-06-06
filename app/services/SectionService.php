<?php
require_once __DIR__ . '/../repositories/SectionRepository.php';

class SectionService
{
    private SectionRepository $repository;

    public function __construct()
    {
        $this->repository = new SectionRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getAllNoOrder()
    {
        return $this->repository->getAllNoOrder();
    }

    public function insertSection(string $section)
    {
        $this->repository->insertSection($section);
    }

    public function deleteSection(int $sectionId)
    {
        $this->repository->deleteSection($sectionId);
    }

    public function updateSection(string $newSectionName)
    {
        $this->repository->updateSection($newSectionName);
    }
}