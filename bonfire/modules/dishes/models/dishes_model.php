<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dishes_model extends BF_Model {

	protected $table		            = "dishes";
    protected $ingredients_table		= "dishes_ingredients";
    protected $nutrients_table		    = "nutrients";
    protected $nutrient_values_table		    = "nutrient_values";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
    protected $number_of_ingredients=5;
    
    
    function    get_images_web_directory($id)
    {
        return  HOST.'bonfire/modules/dishes/uploads/'.$id.'.jpg';
    }
    function    get_images_upload_loaction()
    {
        return  getcwd().'/bonfire/modules/dishes/uploads/';
    }
    function    list_all_images($id)
    {
        $path=$this->get_images_upload_loaction();
        $files = scandir($path);
        
        $count=1;
        unset($files[0],$files[1]);
        foreach($files as $file)
        {
            $count++;
            $till=strpos($file,'_');
            //echo substr($file,0,$till).'<-name';
            $prefix=substr($file,0,$till);
            //echo $prefix;
           
            if($prefix!=$id)
            {
                
                unset($files[$count]);
            }
        }
        
        return  $files;
    }
    function    count_images($id)
    {
        $path=$this->get_images_upload_loaction();
        $files = scandir($path);
        $count=0;
        foreach($files as $file)
        {
            $till=strpos($file,'_');
            if(substr($file,0,$till)==$id)
            {
                $count++;
            }
        }
        return  $count;
    }
    function    get_number_of_ingredients()
    {
        return  $this->number_of_ingredients;
    }
    function    get_units()
    {
        return  array(
                        'G'     =>  'G',
                        'kJ'    =>  'KJ',
                        'MG'    =>  'MG',
                        'UG'    =>  'UG',
                        'KCAL'  =>  'KCAL'
                    );
    }
    function    insert_ingredients($dish_id,$descriptions)
    {
        
        $this->db->trans_begin();
        $this->dishes_model->empty_ingredients($dish_id);
        $descriptions=urldecode($descriptions);
        $descriptions_array=explode(',',$descriptions);
        
        for($i=1;$i<=count($descriptions_array);$i++)
        {
            if($descriptions_array[$i]=='')continue;
            
            $result=$this->dishes_model->get_nutrient($descriptions_array[$i]);
            foreach($result->result() as $row)
            {
                
                $value=$row->value;
                 if(round($value,3)==0)
                {
                    continue;
                }
                
                $name=$row->name;
                $unit_name=$row->unit_name;
                $nutrient_no=$row->nutrient_number;
               
                $data=array(
                                    'dish_id'       =>  $dish_id,
                                    'ingredient'    =>  $name,
                                    'quantity'      =>  $value,
                                    'unit'          =>  $unit_name,
                                   
                                );
                
                $this->db->insert($this->ingredients_table,$data);    
                
            }
            
        }
        
        $query=
                    '
                        SELECT  ingredient, AVG(quantity) AS quantity, unit
                        FROM    '.$this->ingredients_table.'
                        WHERE   dish_id="'.$dish_id.'"
                        GROUP   BY ingredient, unit
                        ;
                    ';
       
       
        $result=$this->db->query($query);
        $this->dishes_model->empty_ingredients($dish_id);
        foreach($result->result() as $row)
        {
            
            $value=$row->quantity;
           
            $name=$row->ingredient;
            $unit_name=$row->unit;
            $nutrient_no=$row->nutrient_number;
            $data=array(
                                    'dish_id'       =>  $dish_id,
                                    'ingredient'    =>  $name,
                                    'quantity'      =>  $value,
                                    'unit'          =>  $unit_name,
                                    
                                   
                                );
            $this->db->insert($this->ingredients_table,$data);
        }
        
       $this->db->trans_complete();
        
    }
    function    ingredient_exists($criteria)
    {
        $result=$this->db->get_where($this->ingredients_table,$criteria);
        if($result->num_rows()>0 )
        {
            return  true;
        }
        else
        {
            return  false;
        }
    }
    function    get_ingredient($criteria)
    {
        
        $result=$this->db->get_where($this->ingredients_table,$criteria);
        if($result->num_rows()>0 )
        {
            return  $result->row();
        }
        else
        {
            return  false;
        }
    }
    function    get_ingredients($dish_id)
    {
        $criteria=array('dish_id'=>$dish_id);
        $result=$this->db->get_where($this->ingredients_table,$criteria);
        return $result;
    }
    function    update_ingredient($data,$criteria)
    {
        $this->db->update($this->ingredients_table,$data,$criteria);
    }
    function    empty_ingredients($criteria)
    {
        $query='DELETE FROM '.$this->ingredients_table.'
                WHERE   dish_id='.$criteria['dish_id'].'
                ;';
        
        $this->db->query($query);
        
        
    }
    function    remove_ingredients($criteria)
    {
        $this->db->delete($this->ingredients_table,$criteria);
    }
    function    get_nutrient($criteria)
    {
       
       $query='
                    SELECT  AVG(nutrient_value) as value,'.$this->nutrients_table.'.name,unit_name,'.$this->nutrients_table.'.nutrient_number
                    FROM    '.$this->nutrient_values_table.','.$this->nutrients_table.'  
                    WHERE   '.$this->nutrient_values_table.'.sr_description LIKE "%'.$criteria.'%"
                    AND     '.$this->nutrient_values_table.'.nutrient_number='.$this->nutrients_table.'.nutrient_number 
                    GROUP   BY  '.$this->nutrients_table.'.name,'.$this->nutrients_table.'.unit_name 
                    ;
                ';
        
       
        return  $this->db->query($query);
        
    }
    function    save_nutrients($dish_id,$criteria)
    {
        
        
        $result=$this->dishes_model->get_nutrient($criteria);
        foreach($result->result() as $row)
        {
           
            $name=$row->name;
            $value=$row->value;
            $unit_name=$row->unit_name;
            $nutrient_no=$row->nutrient_number;
            if($value==0)
            {
                continue;
            }
            $data=array(
                            'dish_id'       =>  $dish_id,
                            'ingredient'    =>  $name,
                            'ingredient_no' =>  $nutrient_no,
                            'quantity'      =>  $value,
                            'unit'          =>  $unit_name,
                        
                        );
            
            $this->db->insert($this->ingredients_table,$data);
        }
        
        
    }
    
    
}
