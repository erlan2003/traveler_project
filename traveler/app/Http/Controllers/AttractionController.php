<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\User;

class AttractionController extends Controller
{
    public function show($id)
    {
        $attraction = Attraction::findOrFail($id);

        return view('attractions.show', compact('attraction'));
    }
   public function index()
    {
         $attractions = Attraction::all();

         return view('attractions.index', compact('attractions'));
    }

    public function create()
    {
        return view('attractions.create');
    }

   public function store(Request $request)
   {
    try {
        $request->validate([
        'attraction' => 'required|string',
            'region' => 'required|in:Ош,Баткен,Чуй,Жалал-Абад,Ыссык-Кол,Нарын,Талас',
            'attractionType' => 'required|in:Историческое место,Памятники и статуи,Природная красота,Современные архитектурные объекты,Религиозные места,Этнографические объекты',
            'information' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
    ]);

    $attraction = new Attraction([
        'attraction' => $request->input('attraction'),
            'region' => $request->input('region'),
            'attractionType' => $request->input('attractionType'),
            'information' => $request->input('information'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
    ]);

     // $attraction->user_id = auth()->id();

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('attraction_photos');
        $attraction->photo = $photoPath;
    }

    $attraction->save();

    return redirect('/')->with('success', 'Достопримечательность успешно добавлена.');
    } catch (\Exception $e) {
        // Записывайте исключение в логи или обрабатывайте его так, как имеет смысл для вашего приложения
        return redirect()->back()->with('error', 'Произошла ошибка при загрузке фотографии.');
    }
}
    public function showUserAttractions($userId)
    {
        $user = User::findOrFail($userId);
        $attractions = $user->attractions;

        return view('User.attractions', compact('user', 'attractions'));
    }

 }

