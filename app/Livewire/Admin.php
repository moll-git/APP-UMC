<?php

namespace App\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public string $selectedAction = 'members';
    public string $announceText   = '';
    public bool   $announceSent   = false;
    public string $previewText    = '';

    public array $delegat = [
        'dia_setmana'   => '',
        'numero_dia'    => '',
        'hora'          => '',
        'lloc_reunio'   => '',
        'tipus_acte'    => '',
        'poble_detalls' => '',
        'uniforme'      => 'estiu',
        'confirmar'     => true,
    ];

    public array $membersList = [
        ['initials' => 'MR', 'name' => 'Miguel Rodríguez', 'role' => 'Guitarra', 'isAdmin' => true],
        ['initials' => 'AN', 'name' => 'Ana García',       'role' => 'Voz',      'isAdmin' => false],
        ['initials' => 'LP', 'name' => 'Laura Pérez',      'role' => 'Batería',  'isAdmin' => false],
        ['initials' => 'JM', 'name' => 'Javier Martín',    'role' => 'Bajo',     'isAdmin' => false],
    ];

    // ── Delegat ───────────────────────────────────────────────

    public function updatedDelegat($value, $key): void
    {
        $this->generatePreview();
    }

public function generatePreview(): void
{
    $d = $this->delegat;

    $anyFilled = !empty(trim((string) $d['dia_setmana']))
              || !empty(trim((string) $d['numero_dia']))
              || !empty(trim((string) $d['hora']))
              || !empty(trim((string) $d['lloc_reunio']))
              || !empty(trim((string) $d['tipus_acte']))
              || !empty(trim((string) $d['poble_detalls']));

    if (! $anyFilled) {
        $this->previewText = '';
        return;
    }

    $msg = 'Bon dia a tots i a totes,';

    if (!empty(trim((string) $d['dia_setmana']))) {
        $dia = trim((string) $d['dia_setmana']);
        $dia = strtolower($dia);
        $msg .= ', el *' . $dia . '*';
    }

    if (!empty(trim((string) $d['numero_dia']))) {
        $msg .= ' *' . trim((string) $d['numero_dia']) . '*';
    }

    if (!empty(trim((string) $d['hora']))) {
        $msg .= ' a les *' . trim((string) $d['hora']) . '*';
    }

    if (!empty(trim((string) $d['lloc_reunio']))) {
        $lloc = trim((string) $d['lloc_reunio']);
        $llocLower = strtolower($lloc);
        
        if (preg_match('/^(a |al |a la |a l\'|en |els |la |el )/i', $llocLower)) {
            $msg .= ' ' . $lloc;
        } else {
            $msg .= ' a ' . $lloc;
        }
    }

    if (!empty(trim((string) $d['tipus_acte']))) {
        $acte = trim((string) $d['tipus_acte']);
        $acte = strtolower($acte);
        $msg .= ' per fer *' . $acte . '*';
    }

    // Detalles extra - separado con punto y primera letra en mayúscula
    if (!empty(trim((string) $d['poble_detalls']))) {
        $extra = trim((string) $d['poble_detalls']);
        $extra = ucfirst($extra);
        $msg .= '. ' . $extra;
    }

    // Punto final solo si no termina ya en punto
    if (!str_ends_with($msg, '.')) {
        $msg .= '.';
    }

    // Uniforme con formato correcto
    if (!empty(trim((string) $d['uniforme']))) {
        $uniformeText = match($d['uniforme']) {
            'estiu' => "Uniforme d'estiu",
            'hivern' => "Uniforme d'hivern",
            'paisa' => "De paisà",
            default => ''
        };
        $msg .= ' ' . $uniformeText . '.';
    }

    // Confirmación condicional
    if (!empty($d['confirmar'])) {
        $msg .= ' CONFIRMAR.';
    }

    $this->previewText = $msg;
}

    public function sendDelegatMessage(): void
    {
        if (empty(trim($this->previewText))) {
            return;
        }

        $url = 'https://wa.me/?text=' . urlencode($this->previewText);
        $this->dispatch('open-whatsapp', url: $url);
    }

    public function resetDelegatForm(): void
    {
        $this->delegat = [
            'dia_setmana'   => '',
            'numero_dia'    => '',
            'hora'          => '',
            'lloc_reunio'   => '',
            'tipus_acte'    => '',
            'poble_detalls' => '',
            'uniforme'      => 'estiu',
            'confirmar'     => true,
        ];
        $this->previewText = '';
    }

    // ── General ───────────────────────────────────────────────

    public function selectAction($action): void
    {
        $this->selectedAction = $action;
        $this->announceSent   = false;
    }

    public function publishAnnouncement(): void
    {
        if (empty(trim($this->announceText))) {
            return;
        }

        $this->announceSent = true;
        $this->announceText = '';
    }

    public function render()
    {
        return view('livewire.admin');
    }
}