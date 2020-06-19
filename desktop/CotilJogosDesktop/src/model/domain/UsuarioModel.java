/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.domain;

/**
 *
 * @author 55199
 */
public class UsuarioModel {
    
    private String ra;
    private String email;
    private String nome;
    private String sobrenome;
    
    
    public UsuarioModel(){}
    
    public UsuarioModel(String ra, String email, String nome, String sobrenome){
        
        this.ra = ra;
        this.email = email;
        this.nome = nome;
        this.sobrenome = sobrenome;
    }

    public String getRa() {
        return ra;
    }

    public void setRa(String ra) {
        this.ra = ra;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getSobrenome() {
        return sobrenome;
    }

    public void setSobrenome(String sobrenome) {
        this.sobrenome = sobrenome;
    }
   
}
