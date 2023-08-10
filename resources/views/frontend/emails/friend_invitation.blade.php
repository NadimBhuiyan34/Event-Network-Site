<!-- resources/views/emails/friend-invitation.blade.php -->

<p>Hello,</p>
<p>You have been invited to join as a friend on our site.</p>
<p>Click on the link below to accept the invitation:</p>
<p><a href="{{ route('accept.invitation', ['email' => $invitation->email, 'id' =>$invitation->user_id ]) }}">Accept Invitation</a>
</p>
