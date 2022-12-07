import { Component, OnInit } from '@angular/core';
import { PersonasService } from 'src/app/services/servicio.service';

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.page.html',
  styleUrls: ['./perfil.page.scss'],
})
export class PerfilPage implements OnInit {
  perfil=[];
  constructor(private rolesService:PersonasService) 
  {
    this.perfil=this.rolesService.asignacionPerfil();
    console.log('prueba: ',this.perfil);
   }

  ngOnInit() {
  }
}
