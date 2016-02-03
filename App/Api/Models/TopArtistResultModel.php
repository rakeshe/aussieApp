<?php
/**
 *
 * @package    ArtistResultModel.php
 * @author     Rakesh Shrestha
 * @since      4/2/16 1:21 AM
 * @version    1.0
 */
namespace App\Api\Models;

class TopArtistResultModel extends AbstractResultrModel
{

    /** @var  String */
    protected $country;

    /** @var  String */
    protected $mbid;

    /** @var  String */
    protected $artistName;

    /** @var  String */
    protected $url;

    /** @var  String */
    protected $image;

    /** @var  Integer */
    protected $rank;


    public function parse(){

    }

    /**
     * @return String
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * @param String $artistName
     */
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;
    }

    /**
     * @return String
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param String $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return String
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param String $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return String
     */
    public function getMbid()
    {
        return $this->mbid;
    }

    /**
     * @param String $mbid
     */
    public function setMbid($mbid)
    {
        $this->mbid = $mbid;
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param String $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }





}