<?php

class BaasModel 
{
	public function getBoss()
	{
		$sql = "SELECT naam FROM baas";

		$query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->naam;
	}
}