<?php

namespace Source\Models;

use Source\Core\Model;

class PhysicalForm extends Model
{
    public function __construct()
    {
        parent::__construct("physical_form", ["id"], ["next_fill", "status", "user_id"]);
    }

    public function save(): bool
    {
        /** Category Update */
        if (!empty($this->id)) {
            $physicalFormId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$physicalFormId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Category Create */
        if (empty($this->id)) {

            $physicalFormId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($physicalFormId))->data();
        return true;
    }
}
