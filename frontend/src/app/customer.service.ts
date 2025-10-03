import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Customer } from './customer.model';

@Injectable({
  providedIn: 'root'
})
export class CustomerService {
  private apiUrl = 'http://localhost:8080/api';
  
  constructor(private http: HttpClient) { }

  /**
   * Recupera la lista completa dei clienti dal backend.
   * Restituisce un Observable.
   */
  getCustomers(): Observable<Customer[]> {
    return this.http.get<Customer[]>(`${this.apiUrl}/customers`);
  }

  /**
   * Recupera un singolo cliente tramite il suo ID.
   * Fa una chiamata API specifica per ottenere tutti i dati, inclusi gli ordini.
   * Restituisce un Observable.
   */
  getCustomerById(id: number): Observable<Customer> {
    return this.http.get<Customer>(`${this.apiUrl}/customers/${id}`);
  }
}