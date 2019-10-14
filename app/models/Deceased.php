<?php
class Deceased extends DBObject
{
    public
        $burial_spot_id,
        $names,
        $age,
        $d_o_birth,
        $d_o_burial,
        $description,
        $owner,
        $photo,
        $owner_info,
        $burial_spot;
    protected $table = 'deceased';
    public function isBurried()
    {
        return $this->burial_spot_id == -1 ? 'NOT_BURRIED' : 'BURRIED';
    }
}
