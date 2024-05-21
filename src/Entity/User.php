<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'wp_users')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USER_EMAIL', fields: ['email'])]
#[ORM\Index(name: 'user_login_key', columns: ['user_login'])]
#[ORM\Index(name: 'user_nicename', columns: ['user_nicename'])]
#[ORM\Index(name: 'user_email', columns: ['user_email'])]
#[UniqueEntity('email', message: 'Na wskazany adres email jest już zarejestrowane konto')]
#[UniqueEntity('displayName', message: 'Istnieje już użytkownik o tej nazwie')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ID", type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: "user_email", length: 180)]
    private ?string $email = "";

    #[ORM\Column(name: "user_nicename", length: 180)]
    private ?string $nickname = "";

    #[ORM\Column(name: "display_name", length: 180)]
    private ?string $displayName = "";

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(name: "user_registered", nullable: true, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?DateTime $createdAt;

    #[ORM\Column(name: "user_login", length: 255)]
    private ?string $login = "";

    #[ORM\Column(name: "user_pass", length: 255)]
    private ?string $userPass = "";

    #[ORM\Column(name: "user_url", length: 100, nullable: true)]
    private ?string $url = "";

    #[ORM\Column(name: "user_activation_key", length: 255, nullable: true)]
    private ?string $activationKey = "";

    #[ORM\Column(name: "user_status", nullable: true)]
    private ?int $status = 0;

    #[ORM\Column]
    private ?bool $acceptRules = false;

    #[ORM\Column]
    private ?bool $active = null;


    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    /**
     * @return list<string>
     * @see UserInterface
     *
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): static
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getUserPass(): ?string
    {
        return $this->userPass;
    }

    public function setUserPass(string $userPass): static
    {
        $this->userPass = $userPass;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getActivationKey(): ?string
    {
        return $this->activationKey;
    }

    public function setActivationKey(?string $activationKey): static
    {
        $this->activationKey = $activationKey;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isAcceptRules(): ?bool
    {
        return $this->acceptRules;
    }

    public function setAcceptRules(bool $acceptRules): static
    {
        $this->acceptRules = $acceptRules;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }
}
