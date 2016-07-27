<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    class clsclient       //class for the tb_client
    {
        public $id,$name,$pwd,$email,$phone_no;
        public function Save_Client()      //function for inserting new client in the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call insclient('$this->name','$this->pwd','$this->email','$this->phone_no')";  //call to stored procedure
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
        
        public function Update_Client()       //function for updating a client in the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
		    echo  " " .$this->id." ".$this->name." ".$this->pwd." ".$this->email." ".$this->phone_no;
            $qry="Call updclient($this->id,'$this->name','$this->pwd','$this->email','$this->phone_no')";   //call to stored procedure
            $res=mysqli_query($link,$qry);
            if(mysqli_affected_rows($link))
            {
                $con->db_close();
		//		exit();
                return TRUE;
            }
            else 
            {
                $con->db_close();
			//	exit();
                return FALSE;
            }
        }
        
        public function Delete_Client()       //function for deleting a client from the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call delclient($this->id)";   //call to stored procedure
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
        
        public function Display_Client()       //function for dispalying clients of the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call dispclient()";   //call to stored procedure
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
        
        public function Find_Client()         ////function for finding a client from the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call findclient($this->id)";   //call to stored procedure
            $res=mysqli_query($link,$qry);
            if(mysqli_num_rows($res)>0)
            {
                $r=mysqli_fetch_row($res);
                $this->id=$r[0];
                $this->name=$r[1];
                $this->pwd=$r[2];
                $this->email=$r[3];
                $this->phone_no=$r[4];
            }
            $con->db_close();
        }
        
        public function Login_Client()
        {
            $con=new clscon();
            $link=$con->db_connect();
            
            $qry="Call loginclient('$this->name','$this->pwd',@ret)";
            $res=  mysqli_query($link, $qry);
            $res1=  mysqli_query($link,"select @ret");
            $r=  mysqli_fetch_row($res1);
            
            $d=$r[0];
            
            if($d==-1)
            {
                $str="Wrong User";
            }
            if($d==-2)
            {
                $str="Wrong Password";
            }
            if($d==1)
            {
                $str="Logged in";
            }
            
            $con->db_close();
            return $str;
            
        }
    }
?>
