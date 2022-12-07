import { Component, Input, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AlertController, ModalController, NavController } from '@ionic/angular';
import { PersonasService } from 'src/app/services/servicio.service';

@Component({
  selector: 'app-registro-usu',
  templateUrl: './registro-usu.page.html',
  styleUrls: ['./registro-usu.page.scss'],
})
export class RegistroUsuPage implements OnInit {
  registroUsuario:FormGroup;

  @Input() title:string;
  @Input() id_usuario:string=null;
  @Input() condicion:boolean=false;
  usuarios=[];

  estado:boolean;

  constructor(private authService:PersonasService,
              private ft:FormBuilder,
             private alertController: AlertController,
            private navController:NavController,
             public activarModa:ModalController
             ) {    
               
            }
            
ngOnInit() 
{
              this.estado=!this.condicion;
              console.log('estado: ',this.estado);
              if(this.condicion){
                this.authService.getById(this.id_usuario,'usuario').subscribe( (res:any)=>{
                  console.log(res)
                  this.registroUsuario.patchValue({
                    name:res.user.name,//aqui
                    email:res.user.email,
                    password:''
                  });
                  
                });
              }
              this.createFormulario();
  }
  createFormulario(){
    this.registroUsuario=this.ft.group({
      name:['',[Validators.required]],
      email:['',[Validators.required, Validators.email]],
      password:['']
    })
  }
  list()
  {
    this.authService.listaUsuario().subscribe((data:any)=>{
      console.log('usuario: ',data);
      this.usuarios=data.data;
      // console.log(this.usuarios);
    })
  }


  onSubmit(form:any){
    if(this.condicion){
      console.log('editar: ',this.condicion);
      
      // console.log(this.id_usuario);
      // console.log(form);
      
      this.authService.EditarUser(this.id_usuario,form).subscribe(data=>{
        console.log(data);
        //this.list();
        this.activarModa.dismiss(this.list());        
        //this.navController.navigateRoot('/usuario');
        // this.presentAlert('EXITO','Actualizado correctamente');

      })
    }
    else{
      console.log('crear: ',this.condicion);  

      this.authService.registroUsua(form.name, form.email, form.password).subscribe((responder)=>{
      //this.onlistadoRegistro(responder),error =>console.log(error)
      console.log('esto lleya: ', responder);
      // this.presentAlert('EXITO','SU USUARIO CREADO');
      //  this.registroUsuario.reset();
      //this.list();
      this.activarModa.dismiss(); 
      this.onlistadoRegistro(responder),error =>console.log(error)    
      //  this.navControler.navigateRoot('/usuario');
      })
    }

  }
  onlistadoRegistro(responder){
    console.log(responder);
    this.list();
  }

  // alert
  async presentAlert(titulo:string, mensage:string) {
    const alert = await this.alertController.create({
      header: titulo,
      message: mensage,
      buttons: ['OK'],
    });

    await alert.present();
  }

}
