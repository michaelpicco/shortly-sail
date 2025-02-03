<?php

namespace App\Http\Controllers;

use App\Models\ShortUrls;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UploadController extends Controller
{

    /**
     * import URLs from CSV file
     *
     * @param Request $request
     * @return void
     */
    public function importFromCsv(Request $request)
    {
        // Validate the request
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        // Get the uploaded file
        $csvFile = $request->file('csv_file');

        // Open the CSV file
        $csvData = file_get_contents($csvFile->getRealPath());

        // Split the CSV data into rows
        $rows = explode("\n", $csvData);

        // Skip the header row
        array_shift($rows);

        // Insert the data into the database
        foreach ($rows as $row) {
            $data = str_getcsv($row);

            do {
                $newUrlHash = Str::random(10);
            } while($hashExists = ShortUrls::where('hash', $newUrlHash)->first()); 

            if (isset($data[1])) {
                ShortUrls::insert([
                    'title' => $data[0],
                    'hash' => $newUrlHash,
                    'url' => $data[1],
                    'created_at' => Carbon::Now()
                ]);                
            }

        }
        

        return redirect()->back()->with('success', 'Success! ' . count($rows) . ' URLs were successfully imported.');
    }

}
