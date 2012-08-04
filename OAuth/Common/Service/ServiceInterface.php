<?php
/**
 * @author Lusitanian <alusitanian@gmail.com>
 * Released under the MIT license.
 */

namespace OAuth\Common\Service;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Storage\TokenStorageInterface;
use OAuth\Common\Http\ClientInterface;
use Artax\Http\Response;

/**
 * Defines the common methods across any OAuth service, be it version 1 or 2.
 */
interface ServiceInterface
{
    /**
     * @param \OAuth\Common\Consumer\Credentials $credentials
     * @param \OAuth\Common\Http\ClientInterface $httpClient
     * @param \OAuth\Common\Storage\TokenStorageInterface $storage
     * @param array $scopes
     * @abstract
     */
    public function __construct(Credentials $credentials, ClientInterface $httpClient, TokenStorageInterface $storage, $scopes = []);

    /**
     * Retrieves and stores/returns the OAuth2 access token after a successful authorization.
     *
     * @abstract
     * @param string $code The access code from the callback.
     * @return TokenInterface $token
     * @throws InvalidTokenResponseException
     */
    public function requestAccessToken($code);

    /**
     * Returns the url to redirect to for authorization purposes.
     *
     * @abstract
     * @param array $additionalParameters
     * @return string
     */
    public function getAuthorizationUrl( array $additionalParameters = [] );

    /**
     * @abstract
     * @return string
     */
    public function getAuthorizationEndpoint();

    /**
     * @abstract
     * @return string
     */
    public function getAccessTokenEndpoint();
}