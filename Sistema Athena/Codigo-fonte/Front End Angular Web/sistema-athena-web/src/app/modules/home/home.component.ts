import { Component, OnInit } from '@angular/core';
import { TokenService } from 'src/app/shared/components/login/token.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  emailLogado: any = '';
  constructor(tokenService: TokenService) { 
    if(tokenService.getCodUsuario() != null){
      this.emailLogado = tokenService.getLoginUsuario();
    }
  }

  ngOnInit(): void {
  }

}
