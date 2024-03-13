<?php

namespace Blopes\SharedModels\Traits;

trait ApiResponseTrait
{
    /**
     * Success response method. All went well, and (usually) some data was returned.
     *
     * @param int           $code
     * @param array         $data
     * @param string        $message
     * @param array         $headers
     *
     * @return Illuminate\Http\Response
     */
    public function sendResponse($code, $data = [], $resource = null, $message = '', $headers = [])
    {
        // Makes sure no empty spaces are present in the message
        $message = trim($message);

        // If the data variable carries a message instead of an array
        if (is_string($data)) {
            // Trims the message in the data
            $message_in_data = trim($data);

            // Creates a new response array to return
            $data = [];

            // If there is a message in the response param ($data) sets the message body
            if (strlen($message_in_data) > 0) {
                $data['message'] = $message_in_data;
            }
        }

        // Overrides the message body if there is a message in the message param ($message)
        if (strlen($message) > 0) {
            $data['message'] = $message;
        }

        if (!isset($headers['location']) && $resource) {
            $headers['location'] = url('api/v1/' . $resource . '/' . $data['id']);
        }

        return response($data, $code, $headers);
    }
}
