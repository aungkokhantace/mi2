/**
 * Created by william on 1/30/2017.
 */


function ValidateEmail(email)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.match(mailformat))
    {
        return true;
    }
    else
    {
        return false;
    }
}