<?php

namespace App\Entity;

use App\Entity\Traits\UpdateCreateByTrait;
use App\Repository\UserRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User implements UserInterface
{
    use UpdateCreateByTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=15, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasConfirmEmail;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_login;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Survey", mappedBy="user")
     */
    private $surveys;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SurveyAnswerList", mappedBy="createdBy")
     */
    private $surveyAnswerLists;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SurveyAnswers", mappedBy="user")
     */
    private $surveyAnswers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserSocialmedia", mappedBy="user")
     */
    private $userSocialmedia;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SurveyComments", mappedBy="user")
     */
    private $surveyComments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ForumCategory", mappedBy="createdBy")
     */
    private $forumCategories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActionLog", mappedBy="user")
     */
    private $actionLogs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ExceptionLog", mappedBy="user")
     */
    private $exceptionLogs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserIp", mappedBy="user")
     */
    private $userIps;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ForumDiscussion", mappedBy="createdBy")
     */
    private $forumDiscussions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ForumDiscussionAnswer", mappedBy="createdBy")
     */
    private $forumDiscussionAnswers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uuid;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SpoilShare", mappedBy="user", orphanRemoval=true)
     */
    private $spoilShares;

    /**
     * @ORM\OneToMany(targetEntity=UserVote::class, mappedBy="user")
     */
    private $userVotes;

    /**
     * @ORM\OneToMany(targetEntity=VoteSite::class, mappedBy="createdBy")
     */
    private $voteSites;

    /**
     * @ORM\Column(type="integer")
     */
    private $credit;

    /**
     * @ORM\OneToMany(targetEntity=StoreArticle::class, mappedBy="createdBy")
     */
    private $storeArticles;

    public function __construct()
    {
        $this->setHasConfirmEmail(false);
        $this->setCredit(0);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
        return 'Y2vb}7km(TX!8j^P6LqEp5Q&P!b}4Xv2na%H7K8uUXiB>$Bz%z62[)444wzX5;94@TY7xQ$p:;Gs*L>eW6%8b5Ms?DGNX$Tu5v!3w32>4f%Dx.^t52+-F:hGh3z9;49V';
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getHasConfirmEmail(): ?bool
    {
        return $this->hasConfirmEmail;
    }

    public function setHasConfirmEmail(bool $hasConfirmEmail): self
    {
        $this->hasConfirmEmail = $hasConfirmEmail;

        return $this;
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    public function getLastLogin(): ?DateTimeInterface
    {
        return $this->last_login;
    }

    public function setLastLogin(?DateTimeInterface $last_login): self
    {
        $this->last_login = $last_login;

        return $this;
    }

    /**
     * @return Collection|Survey[]
     */
    public function getSurveys(): Collection
    {
        return $this->surveys;
    }

    public function addSurvey(Survey $survey): self
    {
        if (!$this->surveys->contains($survey)) {
            $this->surveys[] = $survey;
            $survey->setUser($this);
        }

        return $this;
    }

    public function removeSurvey(Survey $survey): self
    {
        if ($this->surveys->contains($survey)) {
            $this->surveys->removeElement($survey);
            // set the owning side to null (unless already changed)
            if ($survey->getUser() === $this) {
                $survey->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SurveyAnswerList[]
     */
    public function getSurveyAnswerLists(): Collection
    {
        return $this->surveyAnswerLists;
    }

    public function addSurveyAnswerList(SurveyAnswerList $surveyAnswerList): self
    {
        if (!$this->surveyAnswerLists->contains($surveyAnswerList)) {
            $this->surveyAnswerLists[] = $surveyAnswerList;
            $surveyAnswerList->setUserCreatedBy($this);
        }

        return $this;
    }

    public function removeSurveyAnswerList(SurveyAnswerList $surveyAnswerList): self
    {
        if ($this->surveyAnswerLists->contains($surveyAnswerList)) {
            $this->surveyAnswerLists->removeElement($surveyAnswerList);
            // set the owning side to null (unless already changed)
            if ($surveyAnswerList->getUserCreatedBy() === $this) {
                $surveyAnswerList->setUserCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SurveyAnswers[]
     */
    public function getSurveyAnswers(): Collection
    {
        return $this->surveyAnswers;
    }

    public function addSurveyAnswer(SurveyAnswers $surveyAnswer): self
    {
        if (!$this->surveyAnswers->contains($surveyAnswer)) {
            $this->surveyAnswers[] = $surveyAnswer;
            $surveyAnswer->setUser($this);
        }

        return $this;
    }

    public function removeSurveyAnswer(SurveyAnswers $surveyAnswer): self
    {
        if ($this->surveyAnswers->contains($surveyAnswer)) {
            $this->surveyAnswers->removeElement($surveyAnswer);
            // set the owning side to null (unless already changed)
            if ($surveyAnswer->getUser() === $this) {
                $surveyAnswer->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserSocialmedia[]
     */
    public function getUserSocialmedia(): Collection
    {
        return $this->userSocialmedia;
    }

    public function addUserSocialmedia(UserSocialmedia $userSocialmedia): self
    {
        if (!$this->userSocialmedia->contains($userSocialmedia)) {
            $this->userSocialmedia[] = $userSocialmedia;
            $userSocialmedia->setUser($this);
        }

        return $this;
    }

    public function removeUserSocialmedia(UserSocialmedia $userSocialmedia): self
    {
        if ($this->userSocialmedia->contains($userSocialmedia)) {
            $this->userSocialmedia->removeElement($userSocialmedia);
            // set the owning side to null (unless already changed)
            if ($userSocialmedia->getUser() === $this) {
                $userSocialmedia->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SurveyComments[]
     */
    public function getSurveyComments(): Collection
    {
        return $this->surveyComments;
    }

    public function addSurveyComment(SurveyComments $surveyComment): self
    {
        if (!$this->surveyComments->contains($surveyComment)) {
            $this->surveyComments[] = $surveyComment;
            $surveyComment->setUser($this);
        }

        return $this;
    }

    public function removeSurveyComment(SurveyComments $surveyComment): self
    {
        if ($this->surveyComments->contains($surveyComment)) {
            $this->surveyComments->removeElement($surveyComment);
            // set the owning side to null (unless already changed)
            if ($surveyComment->getUser() === $this) {
                $surveyComment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ForumCategory[]
     */
    public function getForumCategories(): Collection
    {
        return $this->forumCategories;
    }

    public function addForumCategory(ForumCategory $forumCategory): self
    {
        if (!$this->forumCategories->contains($forumCategory)) {
            $this->forumCategories[] = $forumCategory;
            $forumCategory->setCreatedBy($this);
        }

        return $this;
    }

    public function removeForumCategory(ForumCategory $forumCategory): self
    {
        if ($this->forumCategories->contains($forumCategory)) {
            $this->forumCategories->removeElement($forumCategory);
            // set the owning side to null (unless already changed)
            if ($forumCategory->getCreatedBy() === $this) {
                $forumCategory->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ActionLog[]
     */
    public function getActionLogs(): Collection
    {
        return $this->actionLogs;
    }

    public function addActionLog(ActionLog $actionLog): self
    {
        if (!$this->actionLogs->contains($actionLog)) {
            $this->actionLogs[] = $actionLog;
            $actionLog->setUser($this);
        }

        return $this;
    }

    public function removeActionLog(ActionLog $actionLog): self
    {
        if ($this->actionLogs->contains($actionLog)) {
            $this->actionLogs->removeElement($actionLog);
            // set the owning side to null (unless already changed)
            if ($actionLog->getUser() === $this) {
                $actionLog->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ExceptionLog[]
     */
    public function getExceptionLogs(): Collection
    {
        return $this->exceptionLogs;
    }

    public function addExceptionLog(ExceptionLog $exceptionLog): self
    {
        if (!$this->exceptionLogs->contains($exceptionLog)) {
            $this->exceptionLogs[] = $exceptionLog;
            $exceptionLog->setUser($this);
        }

        return $this;
    }

    public function removeExceptionLog(ExceptionLog $exceptionLog): self
    {
        if ($this->exceptionLogs->contains($exceptionLog)) {
            $this->exceptionLogs->removeElement($exceptionLog);
            // set the owning side to null (unless already changed)
            if ($exceptionLog->getUser() === $this) {
                $exceptionLog->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserIp[]
     */
    public function getUserIps(): Collection
    {
        return $this->userIps;
    }

    public function addUserIp(UserIp $userIp): self
    {
        if (!$this->userIps->contains($userIp)) {
            $this->userIps[] = $userIp;
            $userIp->setUser($this);
        }

        return $this;
    }

    public function removeUserIp(UserIp $userIp): self
    {
        if ($this->userIps->contains($userIp)) {
            $this->userIps->removeElement($userIp);
            // set the owning side to null (unless already changed)
            if ($userIp->getUser() === $this) {
                $userIp->setUser(null);
            }
        }

        return $this;
    }

    public function countIPs()
    {
        return count($this->userIps);
    }

    /**
     * @return Collection|ForumDiscussion[]
     */
    public function getForumDiscussions(): Collection
    {
        return $this->forumDiscussions;
    }

    public function addForumDiscussion(ForumDiscussion $forumDiscussion): self
    {
        if (!$this->forumDiscussions->contains($forumDiscussion)) {
            $this->forumDiscussions[] = $forumDiscussion;
            $forumDiscussion->setUserCreatedBy($this);
        }

        return $this;
    }

    public function removeForumDiscussion(ForumDiscussion $forumDiscussion): self
    {
        if ($this->forumDiscussions->contains($forumDiscussion)) {
            $this->forumDiscussions->removeElement($forumDiscussion);
            // set the owning side to null (unless already changed)
            if ($forumDiscussion->getUserCreatedBy() === $this) {
                $forumDiscussion->setUserCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ForumDiscussionAnswer[]
     */
    public function getForumDiscussionAnswers(): Collection
    {
        return $this->forumDiscussionAnswers;
    }

    public function addForumDiscussionAnswer(ForumDiscussionAnswer $forumDiscussionAnswer): self
    {
        if (!$this->forumDiscussionAnswers->contains($forumDiscussionAnswer)) {
            $this->forumDiscussionAnswers[] = $forumDiscussionAnswer;
            $forumDiscussionAnswer->setUserCreatedBy($this);
        }

        return $this;
    }

    public function removeForumDiscussionAnswer(ForumDiscussionAnswer $forumDiscussionAnswer): self
    {
        if ($this->forumDiscussionAnswers->contains($forumDiscussionAnswer)) {
            $this->forumDiscussionAnswers->removeElement($forumDiscussionAnswer);
            // set the owning side to null (unless already changed)
            if ($forumDiscussionAnswer->getUserCreatedBy() === $this) {
                $forumDiscussionAnswer->setUserCreatedBy(null);
            }
        }

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return Collection|SpoilShare[]
     */
    public function getSpoilShares(): Collection
    {
        return $this->spoilShares;
    }

    public function addSpoilShare(SpoilShare $spoilShare): self
    {
        if (!$this->spoilShares->contains($spoilShare)) {
            $this->spoilShares[] = $spoilShare;
            $spoilShare->setUser($this);
        }

        return $this;
    }

    public function removeSpoilShare(SpoilShare $spoilShare): self
    {
        if ($this->spoilShares->contains($spoilShare)) {
            $this->spoilShares->removeElement($spoilShare);
            // set the owning side to null (unless already changed)
            if ($spoilShare->getUser() === $this) {
                $spoilShare->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserVote[]
     */
    public function getUserVotes(): Collection
    {
        return $this->userVotes;
    }

    public function addUserVote(UserVote $userVote): self
    {
        if (!$this->userVotes->contains($userVote)) {
            $this->userVotes[] = $userVote;
            $userVote->setUser($this);
        }

        return $this;
    }

    public function removeUserVote(UserVote $userVote): self
    {
        if ($this->userVotes->contains($userVote)) {
            $this->userVotes->removeElement($userVote);
            // set the owning side to null (unless already changed)
            if ($userVote->getUser() === $this) {
                $userVote->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VoteSite[]
     */
    public function getVoteSites(): Collection
    {
        return $this->voteSites;
    }

    public function addVoteSite(VoteSite $voteSite): self
    {
        if (!$this->voteSites->contains($voteSite)) {
            $this->voteSites[] = $voteSite;
            $voteSite->setUserCreatedBy($this);
        }

        return $this;
    }

    public function removeVoteSite(VoteSite $voteSite): self
    {
        if ($this->voteSites->contains($voteSite)) {
            $this->voteSites->removeElement($voteSite);
            // set the owning side to null (unless already changed)
            if ($voteSite->getUserCreatedBy() === $this) {
                $voteSite->setUserCreatedBy(null);
            }
        }

        return $this;
    }

    public function getCredit(): ?int
    {
        return $this->credit;
    }

    public function setCredit(int $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * @return Collection|StoreArticle[]
     */
    public function getStoreArticles(): Collection
    {
        return $this->storeArticles;
    }

    public function addStoreArticle(StoreArticle $storeArticle): self
    {
        if (!$this->storeArticles->contains($storeArticle)) {
            $this->storeArticles[] = $storeArticle;
            $storeArticle->setUserCreatedBy($this);
        }

        return $this;
    }

    public function removeStoreArticle(StoreArticle $storeArticle): self
    {
        if ($this->storeArticles->contains($storeArticle)) {
            $this->storeArticles->removeElement($storeArticle);
            // set the owning side to null (unless already changed)
            if ($storeArticle->getUserCreatedBy() === $this) {
                $storeArticle->setUserCreatedBy(null);
            }
        }

        return $this;
    }

}
