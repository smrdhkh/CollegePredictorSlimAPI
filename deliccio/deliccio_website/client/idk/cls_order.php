<?php
include_once 'config.php';
class clsorder
{
    public $id,$client_id,$sts,$cost,$list,$address;
    public function Save_Order()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="Call insorder($this->client_id,$this->sts,$this->cost,'$this->orderlist','$this->address',$this->ordertime)";
        $res=  mysqli_query($link, $qry);
        if(mysql_affected_rows($link))
        {
            $con->db_close();
            return TRUE;
        }
         else
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function Update_Order()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="Call updorder($this->id,$this->client_id,$this->sts,$this->cost,'$this->orderlist','$this->address',$this->ordertime)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link))
        {
            $con->db_close();
            return TRUE;
        }
         else
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function Delete_Order()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="Call delorder($this->id)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link))
        {
            $con->db_close();
            return TRUE;
        }
         else
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function Display_Order()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="Call disporder()";
        $res=  mysqli_query($link, $qry);
		$arr;
        while($r=mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
            
        } 
		$con->db_close();
            return $arr;
   }
    
    public function Find_Order()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="Call findorder($this->id)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r=mysqli_fetch_row($res);
            $this->id=$r[0];
            $this->client_id=$r[1];
            $this->sts=$r[2];
            $this->cost=$r[3];
            $this->orderlist=$r[4];
            $this->address=$r[5];
			$this->ordertime=$r[6];
        }
			 $con->db_close();
            return TRUE;
       
        
    }
}
?>