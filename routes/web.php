<?php

use Google\Client;
use Google\Service\Docs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {


    $client = new Client();
    $client->setClientId(env('GOOGLE_CLIENT_ID'));
    $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    $client->setRedirectUri('http://127.0.0.1:8000/google-drive/callback');
    $client->setScopes([
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/drive.file',
    ]);
    $url = $client->createAuthUrl();
    return redirect($url);
    // return view('welcome');
});

Route::get('/google-drive/callback', function () {
    $client = new Client();
    $client->setClientId(env('GOOGLE_CLIENT_ID'));
    $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    $client->setRedirectUri('http://127.0.0.1:8000/google-drive/callback');
    $code = request('code');
    $access_token = $client->fetchAccessTokenWithAuthCode($code);
    return $access_token;
    return view('welcome');
});

Route::get('upload', function () {
//     $client = new Client();
//     $access_token = 'ya29.a0Ael9sCNChXHxju6oAxDvSHsPUet4OcM8EsN0QbPjDUUBgnPkRyzPGSxI7TLffxX0nvJJ6zUBX5LUiE1B-EzJvRdbNBC0bEEQJ-ErljRI8Mlk7gBBV-A8_znTdcvOVog2FLUkkqMvIAlVIT47Nu6ou-ZBFBDKaCgYKARYSARESFQF4udJhqMnK1E_Rxx_305y3P1PORw0163';
//     $client->setAccessToken($access_token);
//     $service = new Google\Service\Drive($client);
//     $file = new Google\Service\Drive\DriveFile();

//     $testFile = public_path('example.docx');
//     DEFINE("TESTFILE", $testFile);
//     if (!file_exists(TESTFILE)) {
//         $fh = fopen(TESTFILE, 'w');
//         fseek($fh, 1024 * 1024);
//         fwrite($fh, "!", 1);
//         fclose($fh);
//     }
//    $a = file_get_contents(TESTFILE);
//   dd(mime_content_type(TESTFILE));
//    $b= 'test';
//     $file->setName("Example");
//     $service->files->create(
//         $file,
//         array(
//             'data' => $a.$b,
//             'mimeType' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
//             'uploadType' => 'multipart'
//         )
//     );

   
// ===========================testing

    // Create a new Google API client
    $client = new Client();
    $client->setClientId(env('GOOGLE_CLIENT_ID'));
    $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    $client->setRedirectUri('http://127.0.0.1:8000/google-drive/callback');
    $client->setScopes([
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/drive.file',
        'https://www.googleapis.com/auth/documents',
    ]);
    $access_token = 'ya29.a0Ael9sCOoypHxa1aIrhGN9WOCBSk2t8IJRrF5bt9dJGEWVk7gd_7o83wET5t0x6TGuY8iHbIKoElHke4Dfdf7jshmQIysNuAP_pAlRIcDb3GK0ALNXMgWiG9LzdpZwqJmyggomt7KaHbA1_QCggaypdpqyPAwwQaCgYKARwSARESFQF4udJhaDWRr2Imd0bOh4wiHmDkxg0165';
    $client->setAccessToken($access_token);
    $service = new Google\Service\Drive($client);
    $file = new Google\Service\Drive\DriveFile();   
    
    // Create a new Google Docs client
    // $docs = new Docs($client);
    
    // Load the Blade template
    // $html = View::make('demo')->render();
    // $response = response(View::make('demo')->render(), 200, [
    //     'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    // ]);
    // return $response;
    
    // // Create a new Google Docs document from the HTML content
    // $document = new \Google_Service_Docs_Document(array(
    //     'title' => 'resume',
    // ));
    // $document = $docs->documents->create($document);
    // $documentId = $document->documentId;

    // // Convert the HTML content to a Google Docs document
    // $requests = [
    //     new \Google_Service_Docs_Request([
    //         'insertText' => [
    //             'text' => $html,
    //             'endOfSegmentLocation' => new \Google_Service_Docs_EndOfSegmentLocation(),
    //         ],
    //     ]),
    // ];

    // $batchUpdateRequest = new \Google_Service_Docs_BatchUpdateDocumentRequest([
    //     'requests' => $requests,
    // ]);
    // $docs->documents->batchUpdate($documentId, $batchUpdateRequest);
    // $file = $docs->documents->get($documentId);

    $testFile = view('demo');
    DEFINE("TESTFILE", $testFile);
    if (!file_exists(TESTFILE)) {
        $fh = fopen(TESTFILE, 'w');
        fseek($fh, 1024 * 1024);
        fwrite($fh, "!", 1);
        fclose($fh);
    }
   
    $file->setName("Example");
    $service->files->create(
        $file,
        array(
            'data' => file_get_contents(TESTFILE),
            'mimeType' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'uploadType' => 'multipart'
        )
    );
    // $file = $docs->documents->get($documentId);
   
    // $url = $file->list();
    // dd($url); 
    // return redirect($url);
    
    // Export the Google Docs document as a .docx file
   
    // dd($file);
    // $exportUrl = $file->getExportLinks()['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    // $response = $client->getHttpClient()->get($exportUrl, [
    //     'headers' => [
    //         'Authorization' => 'Bearer ' . $accessToken['access_token'],
    //     ],
    // ]);
    // $content = $response->getBody()->getContents();
    

    // Save the .docx file to disk
    // $filename = 'my-document.docx';
    // file_put_contents($filename, $content);

    // return response()->download($filename);

    // return view('welcome');
});
