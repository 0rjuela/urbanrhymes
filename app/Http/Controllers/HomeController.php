<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Mail;

class HomeController extends Controller
{
    private $videos = [
        '0' => [
            'url' => 'inicio.mp4',
            'progressMsg' => 'Aun eres un indecoroso salta-tapias',
            'progressNumber' => '0',
            'pausedTime' => '7 am',
            'pausedScene' => 'Escena 1',
            'pausedSubtitle' => 'Adivina ésta adivinanza:',
            'pausedTitle' => '¿Qué guarda el perrito en la panza?',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => ''
        ],
        // Escena 1
        '1' => [
            'url' => 'E01.mp4',
            'options' => [
                'B' => 'E01_BK.mp4',
                'M' => 'E01_MK.mp4'
            ],
            'progressMsg' => 'Eres un soez de los andenes',
            'progressNumber' => '25',
            'pausedTime' => '7 am',
            'pausedScene' => 'Escena 1',
            'pausedSubtitle' => 'Adivina ésta adivinanza:',
            'pausedTitle' => '¿Qué guarda el perrito en la panza?',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => 30.5,
        ],
        // Escena 2
        '2' => [
            'url' => 'E02.mp4',
            'options' => [
                'B' => 'E02_BK.mp4',
                'M' => 'E02_MK.mp4'
            ],
            'progressMsg' => 'Eres un bacancito urbano',
            'progressNumber' => '45',
            'pausedTime' => '8:30 AM',
            'pausedScene' => 'Escena 2',
            'pausedSubtitle' => '¿Cómo lo haría el tigre?',
            'pausedTitle' => 'Persigue las cebras que nunca huyen y te dan el cruce libre.',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => 13.5,
        ],
        // Escena 3
        '3' => [
            'url' => 'E03.mp4',
            'options' => [
                'B' => 'E03_PASTEL.mp4', // progress + 1
                'M' => 'E03_BANANO.mp4'      // progress + 2
            ],
            'progressMsg' => 'Eres un bacancito urbano',
            'progressNumber' => '65',
            'pausedTime' => '12:30 PM',
            'pausedScene' => 'Escena 3',
            'pausedSubtitle' => 'Canecas encuentras por doquier:',
            'pausedTitle' => '¿Ignorarlas, o hacer el deber?',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => 35,
        ],
        // Escena 3
        '4' => [
            'url' => 'E03_PASTEL.mp4',
            'options' => [
                'B' => 'E03_PASTEL_BK.mp4',
                'M' => 'E03_PASTEL_MK.mp4'
            ],
            'progressMsg' => 'Eres un bacancito urbano',
            'progressNumber' => '65',
            'pausedTime' => '12:30 PM',
            'pausedScene' => 'Escena 3',
            'pausedSubtitle' => 'Canecas encuentras por doquier:',
            'pausedTitle' => '¿Ignorarlas, o hacer el deber?',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => 16,
        ],
        // Escena 3
        '5' => [
            'url' => 'E03_BANANO.mp4',
            'options' => [
                'B' => 'E03_BANANO_BK.mp4',
                'M' => 'E03_BANANO_MK.mp4'
            ],
            'progressMsg' => 'Eres un ciudadano de rechupete',
            'progressNumber' => '65',
            'pausedTime' => '12:30 PM',
            'pausedScene' => 'Escena 3',
            'pausedSubtitle' => 'Canecas encuentras por doquier:',
            'pausedTitle' => '¿Ignorarlas, o hacer el deber?',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => 16,
        ],
        // Escena 4
        '6' => [
            'url' => 'E04.mp4',
            'options' => [
                'B' => 'E04_BK.mp4',
                'M' => 'E04_MK.mp4'
            ],
            'progressMsg' => 'Eres un adalid de la cheveridad en las calles',
            'progressNumber' => '75',
            'pausedTime' => '17:30 PM',
            'pausedScene' => 'Escena 4',
            'pausedSubtitle' => 'Lucecita, Lucecita:',
            'pausedTitle' => 'Dame una señal para cambiarme de acerita',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => 16.20,
        ],
        '7' => [
            'url' => 'fin.mp4',
            'progressMsg' => 'Eres un adalid de la cheveridad en las calles',
            'progressNumber' => '100',
            'pausedTime' => '17:30 PM',
            'pausedScene' => 'Escena 4',
            'pausedSubtitle' => 'Lucecita, Lucecita:',
            'pausedTitle' => 'Dame una señal para cambiarme de acerita',
            'pausedText' => '<p>Recientes estudios indican que los grupos humanos que sobrepasan los 5 millones de habitantes, concentran cantidades de hormonas y sustancias que conducen los individuos a padecer del síndrome del "Peatón malhechor"</p> <p>Los "Peatones malhechores" de ésta variada y numerosa ciudad, están sujetos al vértigo propio de la convivencia en una gran urbe, y todos los factores que en ello intervienen.</p>',
            'returnPoint' => 0
        ],
        '8' => [
            'progressMsg' => 'Eres un adalid de la cheveridad en las calles',
            'progressNumber' => '100',
            'returnPoint' => 0
        ],
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check()) {
            $this->middleware('auth');
        } else {
            $this->middleware('auth', ['except' => ['terminos']]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $progress = Auth::User()->progress;
        $current  = $this->videos[$progress]['url'];

        return view('welcome')
                ->with('current', $current)
                ->with('progress', $progress)
                ->with('videos', json_encode($this->videos));
    }

    /**
     * Start the game
     */
    public function gameInit()
    {
        $progress       = Auth::User()->progress;
        $current        = $this->videos[$progress]['url'];
        $video_progress = Auth::User()->video_progress;

        return view('game.init')
                ->with('current', $current)
                ->with('progress', $progress)
                ->with('videos', json_encode($this->videos))
                ->with('video_progress', $video_progress);
    }

    /**
     * Update the user progress
     */
    public function updateProgress(Request $request)
    {
        if ($request->ajax()) {
            $progress = $request->progress;

            $user = User::findOrFail(Auth::User()->id);

            $user->progress = $progress;
            $result         = $user->save();

            if ($result) {
                return $user->progress;
            } else {
                return json_encode('false');
            }
        }
    }

    /**
     * Get the progress
     */
    public function getProgress(Request $request)
    {
        if ($request->ajax()) {

            $progress = User::where('id', Auth::user()->id)
                ->get(['progress']);

            return $progress;
        }
    }

    public function contact()
    {
        $progress = Auth::User()->progress;

        $current = $this->videos[$progress]['url'];

        return view('contacto')
                ->with('current', $current)
                ->with('progress', $progress)
                ->with('videos', json_encode($this->videos));
    }

    public function terminos()
    {
        if (Auth::check()) {
            $progress = Auth::User()->progress;
            $current  = $this->videos[$progress]['url'];

            return view('terminos')
                    ->with('current', $current)
                    ->with('progress', $progress)
                    ->with('videos', json_encode($this->videos));
        } else {
            return view('terminos-not-logged');
        }
    }

    /**
     * Cocodrilo
     */
    public function cocodrilo()
    {
        $progress = Auth::User()->progress;
        $current  = $this->videos[$progress]['url'];

        return view('cocodrilo')
                ->with('current', $current)
                ->with('progress', $progress)
                ->with('videos', json_encode($this->videos));
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('main');
    }

    /**
     * Get the Initial user progress
     */
    public function getInitialProgress()
    {
        return Auth::User()->progress;
    }

    /**
     * Set completed
     */
    public function setCompleted(Request $request)
    {
        if ($request->ajax()) {
            $completed = $request->completed;

            $user = User::findOrFail(Auth::User()->id);

            $user->completed = $completed;
            $result          = $user->save();

            if ($result) return json_encode('true');
            else return json_encode('false');
        }
    }

    /**
     * Set Scenes updates
     */
    public function setScenesStatus(Request $request)
    {
        if ($request->ajax()) {
            $scene = $request->scene;
            $value = $request->value;

            $user = User::findOrFail(Auth::User()->id);

            switch ($scene) {
                case 1:
                    $user->scene_1 = $value;
                    break;
                case 2:
                    $user->scene_2 = $value;
                    break;
                case 3:
                    $user->scene_3 = $value;
                    break;
                case 4:
                    $user->scene_4 = $value;
                    break;
            }

            $result = $user->save();

            if ($result) return json_encode('true');
            else return json_encode('false');
        }
    }

    /**
     * Send Email
     */
    public function sendEmail(Request $request)
    {
        $name    = $request->name;
        $email   = $request->email;
        $content = $request->message;

        Mail::send('emails.contacto',
            ['name' => $name, 'email' => $email, 'content' => $content],
            function ($message) {
            $message->from('info.cocodrilo@gmail.com', 'Contacto Cocodrilo');
            $message->subject('Contacto Cocodrilo');
            $message->to('info.cocodrilo@gmail.com');
        });

        return response()->json(['status' => true]);
    }

    /**
     * Set Video Progress
     */
    public function videoProgress(Request $request)
    {
        if ($request->ajax()) {
            $position = $request->position;

            $user = User::findOrFail(Auth::User()->id);

            $user->video_progress = $position;

            $result = $user->save();

            if ($result) return json_encode('true');
            else return json_encode('false');
        }
    }
}