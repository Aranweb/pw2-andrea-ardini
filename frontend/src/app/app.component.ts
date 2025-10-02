import { Component, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css'
})
export class AppComponent {
  apiResponse: any;
  private http = inject(HttpClient);

  testApiConnection() {
    this.http.get('http://localhost:8080/api/test').subscribe(response => {
      this.apiResponse = response;
    });
  }
}
