<?php

namespace App\Services\Traits;

use Illuminate\Support\Facades\Http;

/**
 * Trait for consuming external services.
 */
trait ConsumeExternalService
{
  /**
   * Get the headers for the HTTP request.
   *
   * @param array $headers Additional headers to include in the request.
   *
   * @return \Illuminate\Http\Client\PendingRequest The HTTP request object.
   */
  public function headers(array $headers = [])
  {
    $defaultHeaders = [
      'Accept'        => 'application/json',
      'Authorization' => $this->token,
    ];

    return Http::withHeaders(array_merge($defaultHeaders, $headers));
  }

  /**
   * Send an HTTP request to an external service.
   *
   * @param string $method     The HTTP method to use (e.g. GET, POST, etc.).
   * @param string $endPoint   The endpoint to send the request to.
   * @param array  $formParams The form parameters to include in the request (for POST requests).
   * @param array  $headers    Additional headers to include in the request.
   *
   * @return \Illuminate\Http\Client\Response The HTTP response object.
   */
  public function request(string $method, string $endPoint, array $formParams = [], array $headers = [])
  {
    return $this->headers($headers)->$method($this->url . $endPoint, $formParams);
  }
}
