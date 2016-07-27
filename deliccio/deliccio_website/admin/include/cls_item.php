<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    class clsitem       //class for the tb_item
    {
        public $id,$name,$avail,$cost,$category;
        public function Save_Item()      //function for inserting new item in the tb_item
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call insitem('$this->name','$this->avail',$this->cost,'$this->category')";  //call to stored procedure
            $res=mysqli_query($link,$qry);
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
        
        public function Update_Item()       //function for updating an item in the tb_item
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call upditem($this->id,'$this->name','$this->avail',$this->cost,'$this->category')";   //call to stored procedure
            $res=mysqli_query($link,$qry);
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
        
        public function Delete_Item()       //function for deleting an item from the tb_item
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call delitem($this->id)";   //call to stored procedure
            $res=mysqli_query($link,$qry);
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
        
        public function Display_Item()       //function for dispalying items of the tb_item
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call dispitem()";   //call to stored procedure
            $res=mysqli_query($link,$qry);
            $i=0;
            while($r=mysqli_fetch_row($res))
            {
                $arr[$i]=$r;
                $i++;
            }
            $con->db_close();
            return $arr;
        }
        
        public function Find_Item()         ////function for finding an item from the tb_item
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call finditem($this->id)";   //call to stored procedure
            $res=mysqli_query($link,$qry);
            if(mysqli_num_rows($res)>0)
            {
                $r=mysqli_fetch_rows($res);
                $this->id=$r[0];
                $this->name=$r[1];
                $this->avail=$r[2];
                $this->cost=$r[3];
                $this->category=$r[4];
            }
            $con->db_close();
        }
    }
?>
