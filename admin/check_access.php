<?php
// onno browser jeno dashbard ar access na pay login kora cara tai isset kore dekhbe age j login ar value ase kina..jodi na pay login korte bolbe

if(!isset($_SESSION['user_status']))
{
    header('location: ../login.php');
}

// onno browser jeno dahbard ar access na pay login kora cara tai isset kore dekhbe age j login ar value ase kina..jodi na pay login korte bolbe
?>