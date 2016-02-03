<?php
/**
 *
 * @package    LastfmModel.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:59 PM
 * @version    1.0
 */
namespace App\Api\Models;


use App\Helpers\CurlHelper;

class LastfmModel extends AbstractProviderModel
{
    const PROVIDER_NAME = 'Lastfm';


    protected function init()
    {
        $this->setProviderName(self::PROVIDER_NAME);
    }

    public function getTopArtist()
    {

        $countryName = !empty($this->params[0]) ? $this->params[0] : null;
        $page        = empty($this->params[1]) && !empty($this->providerConfigs['api']['defaultPage'])
            ? $this->providerConfigs['api']['defaultPage']
            : $this->params[1];
        $limit       = !empty($this->providerConfigs['api']['resultLimit'])
            ? $this->providerConfigs['api']['resultLimit']
            : null;

        $requestParams = [
            'page'    => $page,
            'limit'   => $limit + 1,
            'country' => $countryName
        ];

        $this->setRequestEndPoint('geo.getTopArtists', $requestParams)->get();
        if( !empty($this->response->getParsedResponse()->topartists->artist)) {
            $topArtists    = $this->response->getParsedResponse()->topartists->artist;
            $topArtistList = [];
            if ($topArtists) {

                foreach ($topArtists as $rank => $artist) {
                    if(count($topArtistList) == (int) $limit) continue;
                    $topArtist['name']    = !empty($artist->name) ? $artist->name : '';
                    $topArtist['mbid']    = !empty($artist->mbid) ? $artist->mbid : '';
                    $topArtist['url']     = !empty($artist->url) ? $artist->url : '';
                    $topArtist['country'] = $countryName;
                    $image                = json_decode(json_encode($artist->image[2]), true);
                    $topArtist['image']   = reset($image);
                    $topArtist['rank']    = $rank;
                    $topArtistList[]      = $topArtist;
                    unset($topArtist);
                }
                return json_encode($topArtistList, true);
            }
        }
    }

    public function getArtistInfo()
    {
        $mbid          = !empty($this->params[0]) ? $this->params[0] : null;
        $requestParams = [
            'mbid' => $mbid
        ];

        $this->setRequestEndPoint('artist.getInfo', $requestParams)->get();

    }

    public function getTopTracks()
    {
        $mbid  = !empty($this->params[0]) ? $this->params[0] : null;
        $limit       = !empty($this->providerConfigs['api']['trackResultLimit'])
            ? $this->providerConfigs['api']['trackResultLimit']
            : null;
        $requestParams = [
            'mbid'  => $mbid,
            'limit' => $limit
        ];

        $this->setRequestEndPoint('artist.getTopTracks', $requestParams)->get();
        if(!empty($this->response->getParsedResponse()->toptracks->track)) {
            $result    = $this->response->getParsedResponse()->toptracks->track;
            $trackList = [];
            if ($result) {

                foreach ($result as $rank => $trackItem) {
                    $track['mbid']   = !empty($trackItem->mbid) ? $trackItem->mbid : '';
                    $track['artist'] = !empty($trackItem->artist->name) ? $trackItem->artist->name : '';
                    $track['name']   = !empty($trackItem->name) ? $trackItem->name : '';
                    $track['url']    = !empty($trackItem->url) ? $trackItem->url : '';
                    $track['rank'] = $rank;
                    $trackList[]   = $track;
                    unset($track);
                }
                return json_encode($trackList, true);
            }
        }


    }


    protected function setRequestEndPoint($method, $requestParams)
    {
        if ($this->isMethodAllowed($method)) {
            $endPoint = $this->providerConfigs['api']['uriEndPoint'];
            $endPoint .= '?method=' . $method;
            $endPoint .= $this->filterParams($method, $requestParams);
            $this->request->setApiEndPoint($endPoint);
            $this->request->setParams(null);
        }
        return $this;

    }

    protected function isMethodAllowed($method)
    {
        return !empty($this->providerConfigs['packages'][$method]);
    }

    protected function filterParams($method, $requestParams)
    {

        $allowedParams = array_flip(explode(',', $this->providerConfigs['packages'][$method]));

        $filteredParams = array_intersect_key($requestParams, $allowedParams);
        $filteredParams = array_merge($this->getBaseRequestParams(), $filteredParams);

        $returnParams = '';
        foreach ($filteredParams as $key => $var) {
            $returnParams .= '&' . $key . '=' . urlencode($var);
        }
        return $returnParams;

    }

    protected function getBaseRequestParams()
    {
        return ['api_key' => $this->providerConfigs['api']['key'], 'format' => $this->providerConfigs['api']['format']];
    }

}