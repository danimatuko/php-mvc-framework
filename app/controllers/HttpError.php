<?php

/**
 * Class HttpError
 *
 * Handles HTTP error codes and displays an appropriate error message to the user.
 */
class HttpError {
    /**
     * Displays an appropriate error message to the user based on the given HTTP error code.
     *
     * @param int $errorCode The HTTP error code to display an error message for.
     */
    public function httpError($errorCode) {
        $errorMessage = '';
        switch ($errorCode) {
            case 400:
                $errorMessage = 'Bad Request';
                break;
            case 401:
                $errorMessage = 'Unauthorized';
                break;
            case 403:
                $errorMessage = 'Forbidden';
                break;
            case 404:
                $errorMessage = 'Page Not Found';
                break;
            case 500:
                $errorMessage = 'Internal Server Error';
                break;
            case 503:
                $errorMessage = 'Service Unavailable';
                break;
            default:
                $errorMessage = 'Unknown Error';
        }
        echo $errorMessage;
    }
}
