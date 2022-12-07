import { Component, OnInit } from '@angular/core';
//import { ResponseUsuario } from '../Model/Usuatio.model';
import { Storage } from '@ionic/storage-angular';
import { PersonasService } from '../services/servicio.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage implements OnInit {

  rol:string=null;
  //prueba:string='hola';

  constructor(
    private rolSerice:PersonasService,
    private rolserice:Storage,

  ) {
  
   console.log('admin: ',this.rol);
   
  }

  prueba(){
    this.rolSerice.logaut()
  }
  async ngOnInit() {
   this.rol= await this.rolserice.get('role');

  }
  
}
