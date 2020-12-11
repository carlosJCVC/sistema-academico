<?php

namespace App\Traits;
// TODO: remove when bug is fixed, https://github.com/laravel/framework/issues/8972
// Copied from the change that fixed it in 5.5: https://github.com/laravel/framework/pull/18400/files/01d6896cb402d7b641c84ed8d541b1bc96af34ce#diff-6a9cb621261ef4a702081454957adfb2
trait EloquentDirtyFix
{
    public function getDirty()
    {
        $dirty = [];
        foreach ($this->getAttributes() as $key => $value) {
            if (!$this->originalIsEquivalent($key, $value)) {
                $dirty[$key] = $value;
            }
        }
        return $dirty;
    }

    protected function originalIsEquivalent($key, $current)
    {
        if (!array_key_exists($key, $this->original)) {
            return false;
        }
        if ($current === $original = $this->getOriginal($key)) {
            return true;
        }
        // When check rich this check and current attribute value not equals with original, we should skip next steps
        // if current is null
        if (is_null($current) || is_null($original)) {
            return false;
        }
        if ($this->isDateAttribute($key)) {
            return $this->fromDateTime($current) === $this->fromDateTime($original);
        }
        if ($this->hasCast($key)) {
            return $this->castAttribute($key, $current) === $this->castAttribute($key, $original);
        }
        // This method checks if the two values are numerically equivalent even if they
        // are different types. This is in case the two values are not the same type
        // we can do a fair comparison of the two values to know if this is dirty.
        return is_numeric($current) && is_numeric($original)
            && strcmp((string) $current, (string) $original) === 0;
    }

    protected function isDateAttribute($key)
    {
        return in_array($key, $this->getDates()) ||
            $this->isDateCastable($key);
    }
}
