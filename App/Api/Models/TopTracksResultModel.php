<?php
/**
 *
 * @package    ArtistResultModel.php
 * @author     Rakesh Shrestha
 * @since      4/2/16 1:21 AM
 * @version    1.0
 */
namespace App\Api\Models;

class TopTracksResultModel
{

    /** @var  String */
    protected $mbid;

    /** @var  String */
    protected $artistName;

    /** @var  String */
    protected $trackName;

    /** @var  String */
    protected $url;

    /** @var  String */
    protected $image;

    /** @var  Integer */
    protected $rank;

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
    public function getTrackName()
    {
        return $this->trackName;
    }

    /**
     * @param String $trackName
     */
    public function setTrackName($trackName)
    {
        $this->trackName = $trackName;
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