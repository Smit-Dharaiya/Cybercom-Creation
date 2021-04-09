<?php

namespace Model\Admin;

\Mage::loadFileByClassName('Model\Admin\Session');

class Filter extends Session
{
    public function setFilters(array $filters)
    {
        if (!is_array($this->filters)) {
            $this->filters = $filters;
            return $this;
        }
        if (\in_array($filters, $this->filters)) {
            $this->filters = $filters;
            return $this;
        }
        $this->filters = $filters + $this->filters;
        return $this;
    }

    public function getFilters($tableName = null, $key = null)
    {
        if (is_array($this->filters)) {
            if ($tableName) {
                if (array_key_exists($tableName, $this->filters)) {
                    if ($key) {
                        if (array_key_exists($key, $this->filters[$tableName])) {
                            return $this->filters[$tableName][$key];
                        }
                    }
                }
            }
            if ($tableName) {
                if (array_key_exists($tableName, $this->filters)) {
                    return $this->filters[$tableName];
                }
            }
        }
        return;
    }

    public function clearFilters($tableName = null)
    {
        if ($tableName) {
            unset($_SESSION[$this->getNameSpace()]['filters'][$tableName]);
            return $this;
        }
        unset($this->filters);
        return;
    }
}
