<?php

class HubData extends CodonData
{
    public function get_hub()
    {
        return DB::get_results("SELECT * FROM ".TABLE_PREFIX."hubs");
		
    }
	public function getHubs($hubid)
	{
		$query = "SELECT *
				  FROM " . TABLE_PREFIX . "hubs
				  WHERE hubid ='$hubid'";
				  
		return DB::get_row($query);
	}
 	/*public function getAircraft($aircraftid)
    {
		
        $query = "SELECT a.*, f.image
   				  FROM " . TABLE_PREFIX ."aircraft a
    			  LEFT JOIN ".TABLE_PREFIX."fleet f ON a.id=f.aircraftid
				  WHERE a.id ='$aircraftid'";

        return DB::get_row($query);
    }*/
    /*public function get_airline()
    {
        return DB::get_results("SELECT * FROM ".TABLE_PREFIX."codeshares GROUP BY airline");
    }*/
	    public function get_hubs($hubid)
    {
        $query = "SELECT * FROM ".TABLE_PREFIX ."hubs WHERE hubid='$hubid'";

        return DB::get_row($query);
    }
   public function get_past_hub()
    {
        $query = "SELECT * FROM phpvms_hubs
                ORDER BY hubid DESC";

        return DB::get_results($query);
    }
	 public function get_airports()
    {
        return DB::get_results("SELECT * FROM ".TABLE_PREFIX."airports GROUP BY name");
    }
				  
    public function save_new_hub($hubicao, $hubname, $lat, $lng, $image)
    {
        $query = "INSERT INTO phpvms_hubs (hubicao, hubname, lat, lng, image)
                VALUES ('$hubicao', '$hubname', '$lat', '$lng', '$image')";

        DB::query($query);
    }
     public function save_edit_hub($hubicao, $hubname, $lat, $lng, $image, $hubid)
    {
        $query = "UPDATE phpvms_hubs SET
         hubicao='$hubicao',
		 hubname='$hubname',
		 lat='$lat',
		 lng='$lng',
		 image='$image'
         WHERE hubid='$hubid'";

        DB::query($query);
    }
    
    public function delete_hub($hubid)
    {
        $query = "DELETE FROM phpvms_hubs
                    WHERE hubid='$hubid'";

        DB::query($query);
    }
   
}