<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

// Création d'un service qui va conserver en mémoire la session utilisateur.
class RememberService
{
    private $session;

    // Méthode de construction de la session.
    public function __construct(SessionInterface $sessionInterface)
    {
        $this->session = $sessionInterface;
    }

    // Méthode qui va garder en mémoire les paramètres de la session.
    public function seSouvenir(string $nom, string $valeur): void
    {
        $this->session->set($nom, $valeur);
    }

    // Méthode qui va vider de la mémoire les données de la session.
    public function toutOublier(): void
    {
        $this->session->clear();
    }

    // Méthode qui va aller chercher dans la mémoire les données de la session.
    public function donneMoi(string $nom): ?string
    {
        return $this->session->get($nom);
    }
}