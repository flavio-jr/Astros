<?php

namespace Core\Repository\Contracts;

/**
 * Interface RepositoryInterface
 * @package Core\Repository\Contracts
 */
interface RepositoryInterface
{
    public function get($id);

    public function getAll();

    public function save(array $data);

    public function update($id, array $data);

    public function delete($id);
}