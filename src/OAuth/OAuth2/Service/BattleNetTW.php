<?php
namespace OAuth\OAuth2\Service;

use OAuth\Common\Http\Uri\Uri;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Http\Client\ClientInterface;
use OAuth\Common\Storage\TokenStorageInterface;
use OAuth\Common\Http\Uri\UriInterface;

class BattleNetTW extends BattleNetBase
{
    public function __construct(Credentials $credentials, ClientInterface $httpClient, TokenStorageInterface $storage, $scopes = array(), UriInterface $baseApiUri = null)
   	{
        parent::__construct($credentials, $httpClient, $storage, $scopes, $baseApiUri);
        $this->region = 'tw';
        $this->baseApiUri = new Uri('https://' . $this->region . '.api.battle.net/');
	}
}
