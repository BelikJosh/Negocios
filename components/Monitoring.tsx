import React, { useState, useEffect } from 'react';
import { StyleSheet, View, Image, Text, TouchableOpacity, ScrollView, TextInput, Dimensions } from 'react-native';
import { Checkbox } from 'expo-checkbox';
import { useNavigation } from '@react-navigation/native';



const Monitoring = () =>{
     const navigation = useNavigation();
        const [isMale, setIsMale] = useState(false);
        const [isFemale, setIsFemale] = useState(false);
        const [logoSize, setLogoSize] = useState(Dimensions.get('window').width * 0.3);
      
        useEffect(() => {
          const updateSize = () => {
            setLogoSize(Dimensions.get('window').width * 0.3);
          };
          
          Dimensions.addEventListener('change', updateSize);
      
          return () => {
            Dimensions.removeEventListener('change', updateSize);
          };
        }, []);
      
        return (
          <View style={styles.background}>
            <View style={styles.header}>
              <Text style={styles.title}>Pacientes en Observación</Text>
            </View>
            <ScrollView contentContainerStyle={styles.container}>
              <View style={styles.section}>
                <Text style={styles.label}>Nombre</Text>
                <TextInput style={styles.input} placeholder="Nombre" />
              </View>
              <View style={styles.row}>
                <View style={styles.sectionHalf}>
                  <Text style={styles.label}>Edad</Text>
                  <TextInput style={styles.input} placeholder="Edad" keyboardType="numeric" />
                </View>
                <View style={styles.sectionHalf}>
                  <Text style={styles.label}>Peso</Text>
                  <TextInput style={styles.input} placeholder="Peso (kg)" keyboardType="numeric" />
                </View>
              </View>
              <View style={styles.section}>
                <Text style={styles.label}>Sexo</Text>
                <View style={styles.checkboxContainer}>
                  <Checkbox value={isMale} onValueChange={setIsMale} />
                  <Text>Masculino</Text>
                  <Checkbox value={isFemale} onValueChange={setIsFemale} />
                  <Text>Femenino</Text>
                </View>
              </View>
              <View style={styles.infoContainer}>
                <View style={styles.infoFields}>
                  <View style={styles.section}>
                    <Text style={styles.label}>Diagnóstico principal y secundario</Text>
                    <TextInput style={styles.inputLarge} multiline />
                  </View>
                  <View style={styles.section}>
                    <Text style={styles.label}>Medicamentos y Dosis</Text>
                    <TextInput style={styles.inputLarge} multiline />
                  </View>
                  <View style={styles.section}>
                    <Text style={styles.label}>Estado Actual</Text>
                    <TextInput style={styles.inputLarge} multiline />
                  </View>
                  <View style={styles.section}>
                    <Text style={styles.label}>Procedimientos Recientes</Text>
                    <TextInput style={styles.inputLarge} multiline />
                  </View>
                </View>
                <Image source={require('../assets/images/Logo.jpg')} style={[styles.logo, { width: logoSize, height: logoSize }]} />
              </View>
              <TouchableOpacity style={styles.button}>
                <Text style={styles.buttonText}>Dar de Alta</Text>
              </TouchableOpacity>
              <TouchableOpacity style={styles.button}>
                <Text style={styles.buttonText}>N° de Expediente</Text>
              </TouchableOpacity>
              <TouchableOpacity style={styles.button} onPress={() => navigation.navigate("Administration")}>
                <Text style={styles.buttonText}>Regresar</Text>
              </TouchableOpacity>
            </ScrollView>
          </View>
        );
      };
      
      const styles = StyleSheet.create({
        background: {
          flex: 1,
          backgroundColor: '#ffffff',
        },
        header: {
          backgroundColor: '#072dbd',
          padding: 20,
          alignItems: 'center',
        },
        title: {
          fontSize: 20,
          fontWeight: 'bold',
          color: '#ffffff',
        },
        container: {
          padding: 20,
        },
        section: {
          marginBottom: 15,
        },
        sectionHalf: {
          flex: 1,
          marginRight: 10,
        },
        row: {
          flexDirection: 'row',
          justifyContent: 'space-between',
        },
        label: {
          fontSize: 16,
          fontWeight: 'bold',
          marginBottom: 5,
        },
        input: {
          borderWidth: 1,
          borderColor: '#ccc',
          borderRadius: 5,
          padding: 10,
          backgroundColor: '#f9f9f9',
        },
        inputLarge: {
          borderWidth: 1,
          borderColor: '#ccc',
          borderRadius: 5,
          padding: 10,
          height: 80,
          backgroundColor: '#f9f9f9',
        },
        checkboxContainer: {
          flexDirection: 'row',
          alignItems: 'center',
        },
        button: {
          backgroundColor: '#072dbd',
          padding: 10,
          borderRadius: 5,
          alignItems: 'center',
          marginBottom: 10,
        },
        buttonText: {
          color: '#ffffff',
          fontSize: 16,
        },
        backButton: {
          backgroundColor: '#ffffff',
          padding: 10,
          borderRadius: 5,
          alignItems: 'center',
          borderWidth: 1,
          borderColor: '#8B0000',
        },
        infoContainer: {
          flexDirection: 'row',
          alignItems: 'flex-start',
        },
        infoFields: {
          flex: 1,
        },
        logo: {
          marginLeft: 20,
          alignSelf: 'center',
          resizeMode: 'contain', // Ajusta la imagen sin distorsión
        },
      });
    


export default Monitoring
