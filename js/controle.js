// alert('controle')


function showtb(){
    document.getElementById('tab').style.display="inline"
}

function ver(){
    e=document.getElementById('p').value
    b=document.getElementById('n').value
 
    if(e =='' || b=='none'){
        document.getElementById('ms').innerHTML="<div class='alert alert-danger'><strong>Erreur!</strong> choisir un client et saisir un prix"
        
        return false
    }
}

function ver2(){
    b=document.getElementById('n').value

 
    if( b=='none'){
        document.getElementById('ms').innerHTML="<div class='alert alert-danger'><strong>Erreur!</strong> choisir un client "



        

        return false
    }
}

function ver3(){
    b=document.getElementById('n').value

 
    if( b==''){
        document.getElementById('ms').innerHTML="<div class='alert alert-danger'><strong>Erreur!</strong> donner un nome de client "
        
        return false
    }
}



function ver4(){
    e=document.getElementById('n').value
    
 
    if(e ==''){
        document.getElementById('ms').innerHTML="<div class='alert alert-danger'><strong>Erreur!</strong>Saisir un prix"
        
        return false
    }
}

function log(){
   
password=document.getElementById('pas').value;
if(password.length < 8 || password ==''){
    document.getElementById('msg').innerHTML='<div class="alert alert-danger"><strong>Mot passe non valide!<strong></strong></div>'

    return false
}
}

function UPpass(){
    
    cin=document.getElementById('cin').value
    newpas=document.getElementById('new_pas').value
    ret=document.getElementById('ret_pas').value
    if(isNaN(cin)||cin.length!== 8){
        document.getElementById('msg').innerHTML='<div class="alert alert-danger"><strong>Verifier votre Numero de cin<strong></strong></div>'
        return false

    }
    else if(newpas.length < 8 ){
        document.getElementById('msg').innerHTML='<div class="alert alert-danger"><strong>Le mot de passe doit être fort, au moins 8 lettres ou chiffres <strong></strong></div>'
        return false
    }

    else if(ret !== newpas){
        document.getElementById('msg').innerHTML='<div class="alert alert-danger"><strong>Les mots de passe ne correspondent pas <strong></strong></div>'
        return false
    }
}