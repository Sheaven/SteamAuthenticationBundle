<?php

namespace Soljian\SteamAuthenticationBundle\Factory;

use Soljian\SteamAuthenticationBundle\Exception\InvalidUserClassException;
use Soljian\SteamAuthenticationBundle\User\SteamUserInterface;

/**
 * @author Soljian
 */
class UserFactory
{
    /**
     * @var string
     */
    private $userClass;

    /**
     * @param string $userClass
     */
    public function __construct(string $userClass)
    {
        $this->userClass = $userClass;
    }

    /**
     * @param array $userData
     *
     * @return SteamUserInterface
     *
     * @throws InvalidUserClassException
     */
    public function getFromSteamApiResponse(array $userData)
    {
        $user = new $this->userClass;
        if (!$user instanceof SteamUserInterface) {
            throw new InvalidUserClassException($this->userClass);
        }

        $user->setSteamId($userData['steamid']);
        $user->setCommunityVisibilityState($userData['communityvisibilitystate']);
        $user->setProfileState($userData['profilestate']);
        $user->setProfileName($userData['personaname']);
        $user->setLastLogOff(
            isset($userData['lastlogoff']) ? $userData['lastlogoff'] : 0
        );
        $user->setCommentPermission(
            isset($userData['commentpermission']) ? $userData['commentpermission'] : 0
        );
        $user->setProfileUrl($userData['profileurl']);
        $user->setAvatar($userData['avatarfull']);
        $user->setPersonaState($userData['personastate']);
        $user->setPrimaryClanId(
            isset($userData['primaryclanid']) ? $userData['primaryclanid'] : null
        );
        $user->setJoinDate(
            isset($userData['timecreated']) ? $userData['timecreated'] : null
        );
        $user->setCountryCode(
            isset($userData['loccountrycode']) ? $userData['loccountrycode'] : null
        );

        return $user;
    }
}
