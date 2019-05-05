<?php
	include_once 'DB.php';
	include_once 'ImageRedakt.php';
class CRUD{
	public static function create($offer = array()){
		$img = [];
		$img['photo'] =$offer['photo'];
		array_pop($offer);
		$pics = ImageRedakt::save($img);
		$id = ImageRedakt::convert($pics,$img);
		$offer['img_url_id']=$id;
		$values=implode(',',$offer);
		$offer_id = DB::insert('offers','title, short_description, full_description, price, img_url_id', $values);
		var_dump($offer_id);
		$info_new_offer = DB::getById('offers', $offer_id);
		$new_offer_img = DB::getById('pics', $info_new_offer['img_url_id']);
		$info_new_offer['photo'] = $new_offer_img;
		return $info_new_offer;
	}

	public static function getOffersList(){
//		$offers = DB::getAll('offers','id');
		$sql = "SELECT offers.id, offers.title, offers.short_description,offers.full_description, offers.price,
 				pics.url_small as offer_img_small FROM `offers` INNER JOIN pics WHERE offers.img_url_id = pics.id";
		$offers = DB::get($sql);
		return $offers;
	}
}