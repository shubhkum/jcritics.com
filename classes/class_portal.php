<?php 
include('../include/db.php'); 
/**
 * 
 */
class Main
{
	public function pro_india_tagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO pro_india_portal(sender,receiver) VALUES ('$user_id','$portal_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_pro_india($portal_id);
	}
	public function pro_india_untagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM pro_india_portal WHERE sender='$user_id' AND receiver='$portal_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_pro_india($portal_id);
	}
	public function addNum_pro_india($portal_id){
		global $con;
		$query="UPDATE portals SET pro_india=pro_india+1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_pro_india($portal_id){
		global $con;
		$query="UPDATE portals SET pro_india=pro_india-1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function add_rating($user_id,$portal_id,$points){
		global $con;
		$query="UPDATE portals SET total_points=total_points+'$points' WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
		$query="UPDATE portals SET total_ppl_rated=total_ppl_rated+1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
		$this->add_in_rating_table($user_id,$portal_id,$points);
		$this->recal_rating($portal_id);

	}
	public function add_in_rating_table($user_id,$portal_id,$points){
		global $con;
		$query="INSERT INTO rating_portal(sender,receiver,rating_score) VALUES('$user_id','$portal_id','$points')";
		$execute=mysqli_query($con,$query);
	}
	public function recal_rating($portal_id){
		global $con;
		$query="UPDATE portals SET rating= FORMAT((total_points/total_ppl_rated),1) WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function update_rating($user_id,$portal_id,$points,$curr_rating){
		global $con;
		$query="UPDATE portals SET total_points=total_points+'$points'-'$curr_rating' WHERE id='$portal_id'";
		mysqli_query($con,$query);
		$this->update_in_rating_table($user_id,$portal_id,$points);
		$this->recal_rating($portal_id);
	}
	public function update_in_rating_table($user_id,$portal_id,$points){
		global $con;
		$query="UPDATE rating_portal SET rating_score='$points' WHERE sender='$user_id' AND receiver='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function anti_india_tagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO anti_india_portal(sender,receiver) VALUES ('$user_id','$portal_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_anti_india($portal_id);
	}
	public function anti_india_untagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM anti_india_portal WHERE sender='$user_id' AND receiver='$portal_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_anti_india($portal_id);
	}
	public function addNum_anti_india($portal_id){
		global $con;
		$query="UPDATE portals SET anti_india=anti_india+1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_anti_india($portal_id){
		global $con;
		$query="UPDATE jportals SET anti_india=anti_india-1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}

	public function pro_bjp_tagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO pro_bjp_portal(sender,receiver) VALUES ('$user_id','$portal_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_pro_bjp($portal_id);
	}
	public function pro_bjp_untagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM pro_bjp_portal WHERE sender='$user_id' AND receiver='$portal_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_pro_bjp($portal_id);
	}
	public function addNum_pro_bjp($portal_id){
		global $con;
		$query="UPDATE portals SET pro_bjp=pro_bjp+1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_pro_bjp($portal_id){
		global $con;
		$query="UPDATE portals SET pro_bjp=pro_bjp-1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function pro_cong_tagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO pro_cong_portal(sender,receiver) VALUES ('$user_id','$portal_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_pro_cong($portal_id);
	}
	public function pro_cong_untagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM pro_cong_portal WHERE sender='$user_id' AND receiver='$portal_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_pro_cong($portal_id);
	}
	public function addNum_pro_cong($portal_id){
		global $con;
		$query="UPDATE portals SET pro_congress=pro_congress+1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_pro_cong($portal_id){
		global $con;
		$query="UPDATE portals SET pro_congress=pro_congress-1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function leftist_tagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO leftist_portal(sender,receiver) VALUES ('$user_id','$portal_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_leftist($portal_id);
	}
	public function leftist_untagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM leftist_portal WHERE sender='$user_id' AND receiver='$portal_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_leftist($portal_id);
	}
	public function addNum_leftist($portal_id){
		global $con;
		$query="UPDATE portals SET leftist=leftist+1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_leftist($portal_id){
		global $con;
		$query="UPDATE portals SET leftist=leftist-1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function rightist_tagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="INSERT INTO rightist_portal(sender,receiver) VALUES ('$user_id','$portal_id')";
			$execute=mysqli_query($con,$query);
			$this->addNum_rightist($portal_id);
	}
	public function rightist_untagged($user_id,$portal_id){
		    global $con;
		    //insert into pro_india table
			$query="DELETE FROM rightist_portal WHERE sender='$user_id' AND receiver='$portal_id'";
			$execute=mysqli_query($con,$query);
			$this->removeNum_rightist($portal_id);
	}
	public function addNum_rightist($portal_id){
		global $con;
		$query="UPDATE portals SET rightist=rightist+1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}
	public function removeNum_rightist($portal_id){
		global $con;
		$query="UPDATE portals SET rightist=rightist-1 WHERE id='$portal_id'";
		$execute=mysqli_query($con,$query);
	}


}


 ?>