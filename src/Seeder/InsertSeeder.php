<?php

namespace EzeRoldan\VoyagerTools\Seeder;

use Illuminate\Support\Str;

trait InsertSeeder
{
    protected $model = null;
    protected $slugFiled = null;
    protected $dataPartials = [];

    protected function setModelClass(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    protected function setDataPartials(array $partials): self
    {
        $this->dataPartials = $partials;
        return $this;
    }

    protected function setDataPartial(string $key, $value): self
    {
        $this->dataPartials[$key] = $value;
        return $this;
    }

    protected function addDataPartial(string $key, $value): self
    {
        $this->dataPartials[$key] = $value;
        return $this;
    }

    protected function setSlugFiled(string $field): self
    {
        $this->slugFiled = $field;
        return $this;
    }

    protected function getMergedDataPartials(array $data): array
    {
        $partials = $this->dataPartials;
        $merged = array_merge($partials, $data);

        if (!is_null($this->slugFiled) && (!isset($merged['slug']) || !$merged['slug'])) {
            $merged['slug'] = Str::slug($merged[$this->slugFiled]);
        }

        return $merged;
    }

    protected function insert(array $data): self
    {
        $this->model::create($this->getMergedDataPartials($data));
        return $this;
    }

    protected function insertMany(array $data): self
    {
        foreach ($data as $row) {
            $this->model::create($this->getMergedDataPartials($row));
        }
        return $this;
    }

    protected function insertManyByField(string $filed, array $data): self
    {
        array_walk($data, function (&$row) use ($filed) {
            if (is_array($row)) {
                $rowNew = [];
                foreach ($row as $key => $value) {
                    if (is_numeric($key)) {
                        if (!isset($rowNew[$filed])) {
                            $rowNew[$filed] = $value;
                        }
                    } else {
                        $rowNew[$key] = $value;
                    }
                }
                $row = $rowNew;
            } else {
                $row = [$filed => $row];
            }
        });

        return $this->insertMany($data);
    }

    protected function insertManyByFields(array $fileds, array $data): self
    {
        $filedsTotal = count($fileds);
        array_walk($data, function (&$row) use ($fileds, $filedsTotal) {

            $row = is_array($row) ? $row : [$row];

            $rowTotal = count($row);
            if ($filedsTotal === $rowTotal) {
                $row =  array_combine($fileds, $row);
            } elseif ($filedsTotal > $rowTotal) {
                $rowNew = [];
                for ($i = 0; $i < $filedsTotal; $i++) {
                    $rowNew[$fileds[$i]] =  isset($row[$i]) ? $row[$i] : null;
                }
                $row = $rowNew;
            }
        });

        return $this->insertMany($data);
    }
}
