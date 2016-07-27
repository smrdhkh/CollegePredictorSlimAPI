<?php

class clsadmin
{
    public $id,$name,$password,$type,$status; //name passowrd and type of admin
    
    public function Save_Admin()
    {
        $con=new clscon();
        $link=$con->db_connect();       //making a connection
        $p=$this->pwd;
        $qry="Call insadmin('$this->name','$p','$this->type')";    //query to call stored procedure
        $res= mysqli_query($link, $qry);                                        //exceuting the query
        
        if(mysqli_affected_rows($link))
        {
            //new admin created
            $con->db_close();               //close the connection to reduce network traffic
            return TRUE;
        }
        else
        {
            $con->db_close();               //close the connection to reduce network traffic
            return FALSE;
        }
    }
    
    public function Login_Admin()
    {
        $con=new clscon();
        $link=$con->db_connect();       //making a connection
        
        $qry="Call loginadmin('$this->name','$this->password',@ret)";           //query to call stored procedure
        $res=  mysqli_query($link, $qry);                                       //exceuting the query
        $res1=  mysqli_query($link,"select @ret");                              //getting the value returned by stored procedure
        $r=  mysqli_fetch_row($res1);
        
        $d=$r[0];                                                               //getting the return value
        
        if($d==-1)
        {
            $str="Wrong username";
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
    
    public function Update_Admin()
    {
        $con=new clscon();
        $link=$con->db_connect();       //making a connection
    
        if($this->type=="Manager")
        {
            $qry="Call updadmmin($this->id,'$this->name','$this->password','$this->type','$this->status')";    //query to call stored procedure
            $res=  mysqli_query($link, $qry);                                   //exceuting the query
            
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
        else
        {
            return "You have no right to update an admin ";
        }
        
    }
    
    public function Display_Admin()
    {
        $con=new clscon();
        $link=$con->db_connect();                                               //making a connection
        
        $qry="Call dispadmin()";                                                //query for calling the stored procedue
        $res=  mysqli_query($link, $qry);                                       //executing the query
        
        $i=0;
        while($r=mysqli_fetch_row($res))
        {
            $arr[$i]=$r;                                                        //creating an array of results
            $i++;
        }
        
        $con->db_close();                                                       //closing the connection
        return $arr;                                                            //returning the results
    
    }
    
    public function Delete_Admin()
    {
        $con=new clscon();
        $link=$con->db_connect();                                               //conecting to database
        
        $qry="Call deladmin($this->id)";                                        //query for calling the stored procedue
        $res=  mysqli_query($link, $qry);                                       //executing the query
        
        if(mysqli_affected_rows($link))
        {
            $con->db_close();                                                   //closing the connection
            return TRUE;
        }
        else
        {
            $con->db_close();                                                   //closing the connection
            return FALSE;
        }
    }
}

?>